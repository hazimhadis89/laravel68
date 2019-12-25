<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Model\Post;
use App\Http\Requests\Post\PostRequest;
use App\Http\Resources\Post as PostResource;

class PostController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $this->authorize('viewAny', Post::class);
        $posts = Post::orderBy('updated_at', 'desc')->Paginate(10);
        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(PostRequest $request)
    {
        $this->authorize('create', Post::class);
        $post = new Post;
        $input = $request->all();
        $post->fill($request->all());
        $post->slug = $request->input('title');
        $post->user_id = Auth::user()->id;
        if ($post->save()) {
            return response()->json(['message'=>'Create Post Success.'], 201);
        } else {
            return response()->json(['message'=>'Create Post Fail.'], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);
        // return view('posts.view');
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $input = $request->all();
        $post->fill($request->all());
        $post->slug = $request->input('title');
        $post->user_id = Auth::user()->id;
        if ($post->save()) {
            return response()->json(['message'=>'Edit Post Success.'], 200);
        } else {
            return response()->json(['message'=>'Edit Post Fail.'], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        if (Post::destroy($post->id)) {
            return response()->json(['message'=>'Delete Post Success.'], 200);
        } else {
            return response()->json(['message'=>'Delete Post Fail.'], 422);
        }
    }
}
