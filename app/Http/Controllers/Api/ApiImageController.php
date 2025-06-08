<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ApiImageController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/analyze-image",
     *     summary="Analisis gambar menggunakan model AI",
     *     description="Mengirim gambar (upload file atau base64) untuk dianalisis oleh model AI dan mengembalikan hasil klasifikasi.",
     *     operationId="analyzeImage",
     *     tags={"Analisis Gambar"},
     *     security={{"sanctum":{}}},
     *
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"image"},
     *                 @OA\Property(
     *                     property="image",
     *                     type="file",
     *                     description="File gambar (jpg, jpeg, png)"
     *                 )
     *             )
     *         ),
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"camera_image"},
     *                 @OA\Property(
     *                     property="camera_image",
     *                     type="string",
     *                     example="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAA...",
     *                     description="Base64 dari gambar hasil kamera"
     *                 )
     *             )
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Berhasil menganalisis gambar",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Berhasil menganalisis gambar"),
     *             @OA\Property(property="uploaded_image", type="string", example="http://localhost:8000/uploads/xxx.png"),
     *             @OA\Property(property="data", type="object")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request (gambar tidak valid)"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validasi gagal (gambar tidak sesuai)"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Kesalahan server"
     *     )
     * )
     */
    public function analyzeImage(Request $request)
    {
        try {
            $imagePath = null;
            $imageName = null;

            // Validasi gambar
            if ($request->hasFile('image')) {
                $validator = Validator::make($request->all(), [
                    'image' => 'required|image|max:2048',
                ]);

                if ($validator->fails()) {
                    return response()->json(['message' => 'Validasi gagal', 'errors' => $validator->errors()], 422);
                }

                $uploadedFile = $request->file('image');
                $imageName = time() . '_' . Str::random(10) . '.' . $uploadedFile->getClientOriginalExtension();
                $imagePath = public_path('uploads/' . $imageName);
                $uploadedFile->move(public_path('uploads'), $imageName);
            } elseif ($request->filled('camera_image')) {
                $base64Data = $request->input('camera_image');

                if (!preg_match('/^data:image\/(\w+);base64,/', $base64Data, $match)) {
                    return response()->json(['message' => 'Format data base64 tidak valid.'], 400);
                }

                $imageType = strtolower($match[1]);
                if (!in_array($imageType, ['jpg', 'jpeg', 'png'])) {
                    return response()->json(['message' => 'Format gambar tidak didukung.'], 400);
                }

                $base64Data = substr($base64Data, strpos($base64Data, ',') + 1);
                $decodedImage = base64_decode($base64Data);

                if ($decodedImage === false) {
                    return response()->json(['message' => 'Gagal decoding gambar.'], 400);
                }

                $imageName = time() . '_' . Str::random(10) . '.' . $imageType;
                $imagePath = public_path('uploads/' . $imageName);
                file_put_contents($imagePath, $decodedImage);
            } else {
                return response()->json(['message' => 'Tidak ada gambar ditemukan.'], 400);
            }

            // Kirim ke model AI
            $response = Http::attach(
                'image',
                fopen($imagePath, 'r'),
                $imageName
            )->post(config('services.model_ai.key'));

            if ($response->failed()) {
                return response()->json(['message' => 'Gagal memproses gambar.'], 500);
            }

            $resultData = $response->json();
            return response()->json([
                'message' => 'Berhasil menganalisis gambar',
                'data' => $resultData,
                'uploaded_image' => url('uploads/' . $imageName),
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
