<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->orderByDesc('created_at')
            ->limit(8)
            ->get();

        return view('news', [
            'posts' => $posts,
        ]);
    }

    public function show(string $slug)
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->firstOrFail();

        $post->increment('views');

        return view('post', [
            'post' => $post,
        ]);
    }
}
