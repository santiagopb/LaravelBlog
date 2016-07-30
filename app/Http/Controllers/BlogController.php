<?php

namespace Cronti\Http\Controllers;

use Illuminate\Http\Request;
use Cronti\Http\Requests;
use Cronti\Post;

class BlogController extends Controller
{
    public function getSingle($slug) {
        $post = Post::where('slug', '=', $slug)->first();
        return view('post.single')->withPost($post);
    }
}
