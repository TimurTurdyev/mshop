<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        return view('store.blog', [
            'posts' => Post::query()
                ->where('status', 1)
                ->orderByDesc('id')
                ->paginate(15)
        ]);
    }

    public function post(Post $post)
    {
        return view('store.blog-post', [
            'post' => $post
        ]);
    }
}
