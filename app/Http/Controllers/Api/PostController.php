<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection(Post::query()->orderByDesc('id')->paginate());
    }

    public function show(Post $post): PostResource
    {
        return PostResource::make($post);
    }

    public function store(PostRequest $request): PostResource
    {
        $post = Post::query()->create($request->validated());

        return PostResource::make($post);
    }

    public function update(Post $post, PostRequest $request): PostResource
    {
        $post->update($request->validated());

        return PostResource::make($post);
    }

    public function destroy(Post $post): Response
    {
        $post->delete();

        return response()->noContent(Response::HTTP_OK);
    }
}
