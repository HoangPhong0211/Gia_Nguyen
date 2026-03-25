<?php

namespace App\Http\Controllers; // Đảm bảo dòng này đúng

use App\Models\Post;
use App\Http\Controllers\Controller; // THIẾU DÒNG NÀY
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(9);
        $category = (object)['name' => 'Tất cả tin tức']; 
    
        return view('news', compact('posts', 'category'));
    }

    public function show($slug)
    {
        // SỬA DÒNG NÀY: Dùng firstOrFail() thay vì first()
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('post', compact('post'));
    }
}