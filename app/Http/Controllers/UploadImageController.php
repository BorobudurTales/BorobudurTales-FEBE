<?php

namespace App\Http\Controllers;

use App\Models\AnalysisResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    /**
     * Tampilan awal pemilihan metode unggah.
     */
    public function index()
    {
        return view('users.upload', ['title' => 'Analisis Gambar']); // Tombol pilih metode
    }

    /**
     * Tampilan unggah gambar dari file.
     */
    public function uploadImage()
    {
        return view('users.upload-image', ['title' => 'Unggah Gambar']); // Form unggah gambar
    }

    /**
     * Tampilan ambil gambar dari kamera.
     */
    public function takeImage()
    {
        return view('users.take-image', ['title' => 'Ambil Gambar']); // Kamera capture
    }

    /**
     * Proses simpan gambar ke server dan tampilkan hasilnya.
     */
    public function analyze(Request $request)
    {
        try {
            $imageName = time() . '_' . Str::random(10);
            $imagePath = null;
            $fullImagePath = null;

            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|max:2048',
                ]);

                $uploadedFile = $request->file('image');
                $extension = $uploadedFile->getClientOriginalExtension();
                $imageName .= '.' . $extension;
                $storedPath = $uploadedFile->storeAs('uploads', $imageName, 'public');
                $fullImagePath = storage_path('app/public/' . $storedPath);
            } elseif ($request->filled('camera_image')) {
                $request->validate([
                    'camera_image' => 'required|string',
                ]);

                $base64Data = $request->input('camera_image');

                if (!preg_match('/^data:image\/(\w+);base64,/', $base64Data, $matches)) {
                    return back()->withErrors(['error' => 'Format data base64 tidak valid.']);
                }

                $imageType = strtolower($matches[1]);
                if (!in_array($imageType, ['jpg', 'jpeg', 'png'])) {
                    return back()->withErrors(['error' => 'Format gambar tidak didukung.']);
                }

                $decodedImage = base64_decode(substr($base64Data, strpos($base64Data, ',') + 1));
                if ($decodedImage === false) {
                    return back()->withErrors(['error' => 'Gagal decoding gambar.']);
                }
                $imageName .= '.' . $imageType;
                Storage::disk('public')->put('uploads/' . $imageName, $decodedImage);
                $fullImagePath = storage_path('app/public/uploads/' . $imageName);
            } else {
                return back()->withErrors(['error' => 'Tidak ada gambar ditemukan.']);
            }

            $response = Http::attach(
                'image',
                fopen($fullImagePath, 'r'),
                $imageName
            )->post(config('services.model_ai.key'));

            if ($response->failed()) {
                return back()->withErrors(['error' => 'Gagal memproses gambar dari server AI.']);
            }

            $resultData = $response->json();

            AnalysisResult::create([
                'user_id' => Auth::id(),
                'filename' => $imageName,
                'similarity' => $resultData['similarity'] ?? null,
                'tema' => $resultData['tema'] ?? null,
                'narasi' => $resultData['narasi'] ?? null,
                'makna_moral' => $resultData['makna_moral'] ?? null
            ]);

            return view('users.result', [
                'data' => $resultData,
                'uploadedImage' => $imageName,
                'title' => 'Hasil Analisis'
            ]);
        } catch (\Throwable $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
