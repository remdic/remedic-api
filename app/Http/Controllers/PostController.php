<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::paginate(5);

        return response()->json([
            "status" => 1,
            "message" => "posts fetched",
            "data" => $posts
        ]);
    }

    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        return response()->json([
            "status" => 1,
            "message" => "post created",
            "data" => $post
        ]);
    }
}
