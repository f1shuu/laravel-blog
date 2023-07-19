<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostResourceController extends Controller
{
    public function show(string $id): PostResource
    {
        return new PostResource(Post::find($id));
    }

    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection(Post::all());
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'slug' => 'required',
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        Post::create($request->all());
        return response()->json([
            'message' => 'Post created successfully.'
        ], 201);
    }
}
