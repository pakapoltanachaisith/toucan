<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $paginatedPosts = Post::with('user:id,name')->latest()->paginate(10);

        return Inertia::render('posts/index', [
            'posts' => $paginatedPosts->items(),
            'currentPage' => $paginatedPosts->currentPage(),
            'totalPosts' => $paginatedPosts->total(),
            'perPage' => $paginatedPosts->perPage()
        ]);
    }
}
