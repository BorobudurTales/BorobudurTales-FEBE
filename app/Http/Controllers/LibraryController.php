<?php

namespace App\Http\Controllers;

use App\Models\Cerita;
use App\Models\Image;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        $ceritas = Cerita::with('images')->paginate(6);

        return view('users.pustaka', compact('ceritas'));
    }

    public function show($id)
    {
        $ceritaId = Cerita::with('images')->findOrFail($id);
        return view('users.pustaka-detail', compact('ceritaId'));
    }

    // public function show(Story $story)
    // {
    //     $story->increment('views');
    //     return view('library.show', compact('story'));
    // }
}
