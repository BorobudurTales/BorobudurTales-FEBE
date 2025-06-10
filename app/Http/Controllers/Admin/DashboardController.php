<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnalysisResult;
use App\Models\Cerita;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahUser = User::count();
        $jumlahHistory = AnalysisResult::count();
        $jumlahCerita = Cerita::count();
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'jumlahUser' => $jumlahUser,
            'jumlahHistory' => $jumlahHistory,
            'jumlahCerita' => $jumlahCerita
        ]);
    }
}
