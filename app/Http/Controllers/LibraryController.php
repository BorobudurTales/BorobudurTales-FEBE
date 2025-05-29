<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        $query = Story::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filter === 'popular') {
            $query->orderByDesc('likes');
        } elseif ($request->filter === 'viewed') {
            $query->orderByDesc('views');
        } else {
            $query->latest();
        }

        $stories = $query->paginate(6);
        return view('library.index', compact('stories'));
    }

    public function show(Story $story)
    {
        $story->increment('views');
        return view('library.show', compact('story'));
    }
}
