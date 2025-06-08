<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cerita;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="Image",
 *     type="object",
 *     title="Image",
 *     description="Gambar terkait cerita",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="url", type="string", example="http://localhost/storage/images/image1.jpg"),
 *     @OA\Property(property="cerita_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-06-07T10:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-06-07T10:00:00Z"),
 * )
 *
 * @OA\Schema(
 *     schema="Cerita",
 *     type="object",
 *     title="Cerita",
 *     description="Data cerita lengkap dengan images",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Judul Cerita"),
 *     @OA\Property(property="content", type="string", example="Isi cerita yang lengkap..."),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-06-07T10:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-06-07T10:00:00Z"),
 *     @OA\Property(
 *         property="images",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Image")
 *     ),
 * )
 */
class CeritaApiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/ceritas",
     *     summary="Get all cerita with images",
     *     tags={"Cerita"},
     *     security={{"sanctum": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Data cerita berhasil diambil"),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Cerita")
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Unauthorized, please login")
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized, please login',
            ], 401);
        }

        $ceritas = Cerita::with('images')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data cerita berhasil diambil',
            'data' => $ceritas
        ]);
    }
    /**
     * @OA\Get(
     *     path="/api/ceritas/{id}",
     *     summary="Get single cerita by id",
     *     tags={"Cerita"},
     *     security={{"sanctum": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID cerita",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Data cerita berhasil diambil"),
     *             @OA\Property(property="data", ref="#/components/schemas/Cerita")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Data not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Data cerita tidak ditemukan"),
     *             @OA\Property(property="data", type="null", example=null)
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Unauthorized, please login")
     *         )
     *     )
     * )
     */
    public function show($id)
    {
        $cerita = Cerita::with('images')->find($id);
        if (!$cerita) {
            return response()->json([
                'status' => false,
                'message' => 'Data cerita tidak ditemukan',
                'data' => null
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data cerita berhasil diambil',
            'data' => $cerita
        ]);
    }
}
