<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnalysisResult;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = AnalysisResult::orderBy('created_at', 'desc')->paginate(4);
        return view('admin.history', [
            'title' => 'Halaman history',
            'histories' => $histories
        ]);
    }
    public function destroy($id)
    {
        $history = AnalysisResult::findOrFail($id);
        $history->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
