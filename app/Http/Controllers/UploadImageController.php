<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            $imagePath = null;
            $imageName = null;

            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'required|image|max:2048',
                ]);

                $uploadedFile = $request->file('image');
                $imageName = time() . '_' . Str::random(10) . '.' . $uploadedFile->getClientOriginalExtension();
                $imagePath = public_path('uploads/' . $imageName);

                $uploadedFile->move(public_path('uploads'), $imageName);
            } elseif ($request->filled('camera_image')) {
                $base64Data = $request->input('camera_image');

                if (!preg_match('/^data:image\/(\w+);base64,/', $base64Data, $match)) {
                    return back()->withErrors(['error' => 'Format data base64 tidak valid.']);
                }

                $imageType = strtolower($match[1]);
                if (!in_array($imageType, ['jpg', 'jpeg', 'png'])) {
                    return back()->withErrors(['error' => 'Format gambar tidak didukung.']);
                }

                $base64Data = substr($base64Data, strpos($base64Data, ',') + 1);
                $decodedImage = base64_decode($base64Data);

                if ($decodedImage === false) {
                    return back()->withErrors(['error' => 'Gagal decoding gambar.']);
                }

                $imageName = time() . '_' . Str::random(10) . '.' . $imageType;
                $imagePath = public_path('uploads/' . $imageName);
                file_put_contents($imagePath, $decodedImage);
            } else {
                return back()->withErrors(['error' => 'Tidak ada gambar ditemukan.']);
            }
            $response = Http::attach(
                'image',
                fopen($imagePath, 'r'),
                $imageName
            )->post(config('services.model_ai.key'));
            // dd(config('services.model_ai.key'));

            if ($response->failed()) {
                return back()->withErrors(['error' => 'Gagal memproses gambar.']);
            }
            $resultData = $response->json();
            return view('users.result', [
                'data' => $resultData,
                'uploadedImage' => $imageName,
                'title' => 'Hasil Analisis'
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
