<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts');
    }

    public function get(Request $request): JsonResponse
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
//       dd(Post::orderBy('created_at', 'desc'));
        return response()->json($posts);
    }

    public function store(Request $request): JsonResponse
    {
//        dd($request->request);
        $post = Post::create($request->all());
        return response()->json($post);
    }

    public function delete($id): JsonResponse
    {
        Post::destroy($id);

        return response()->json("ok");
    }

}
