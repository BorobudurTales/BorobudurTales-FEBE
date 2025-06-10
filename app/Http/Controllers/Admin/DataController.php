<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cerita;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $datas = Cerita::with('images')->paginate(5);
        return view('admin.data', [
            'title' => 'Halaman Data',
            'datas' => $datas
        ]);
    }

    public function show($id)
    {
        $data = Cerita::with('images')->findOrFail($id);
        return view('admin.edit-data', ['data' => $data, 'title' => 'Detail Data']);
    }
    public function destroy($id)
    {
        $history = Cerita::with('images')->findOrFail($id);
        $history->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
