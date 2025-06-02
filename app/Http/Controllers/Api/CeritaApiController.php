<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cerita;
use Illuminate\Http\Request;

class CeritaApiController extends Controller
{
    public function index()
    {
        $ceritas = Cerita::with('images')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data cerita berhasil diambil',
            'data' => $ceritas
        ]);
    }
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
