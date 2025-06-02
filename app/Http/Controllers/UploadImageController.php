<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    /**
     * Tampilan awal pemilihan metode unggah.
     */
    public function index()
    {
        return view('auth.upload'); // Tombol pilih metode
    }

    /**
     * Tampilan unggah gambar dari file.
     */
    public function uploadImage()
    {
        return view('auth.upload-image'); // Form unggah gambar
    }

    /**
     * Tampilan ambil gambar dari kamera.
     */
    public function takeImage()
    {
        return view('auth.take-image'); // Kamera capture
    }

    /**
     * Proses simpan gambar ke server dan tampilkan hasilnya.
     */
    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $path = $request->file('image')->store('uploads', 'public'); // Simpan gambar

        // Redirect ke halaman hasil (result) dengan membawa path
        return redirect()->route('upload.result')->with([
            'image_path' => $path,
            'success' => 'Gambar berhasil diunggah!',
            // Tambahkan data hasil analisis di sini jika ada
            'result' => 'Ini hasil analisis contoh'
        ]);
    }

    /**
     * Tampilan halaman hasil setelah upload.
     */
    public function showResult()
    {
        return view('auth.result', [
            'image_path' => session('image_path'),
            'success' => session('success'),
            'result' => session('result')
        ]);
    }
}
