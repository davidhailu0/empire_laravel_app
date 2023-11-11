<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function store(Request $request)
    {
        Post::create(['body' => $request->body, 'user_id' => auth()->user()->id]);
        return redirect()->route('post');
    }
}