<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user:id,name')->latest()->get();

        return Inertia::render('posts/index', [
            'posts' => $posts
        ]);
    }
}
