<?php

namespace App\Http\Controllers\Web;

use Auth;
use App\Model\Post;
use App\Http\Requests\Post\PostRequest;
use Session;

class PostController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $this->authorize('viewAny', Post::class);
        $posts = Post::orderBy('updated_at', 'desc')->Paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        return view('posts.create');
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
            Session::flash('success', 'Create Post Success.');
        } else {
            Session::flash('error', 'Create Post Fail.');
        }
        return redirect()->route('posts.index');
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
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
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
            Session::flash('success', 'Edit Post Success.');
        } else {
            Session::flash('error', 'Edit Post Fail.');
        }
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        if (Post::destroy($post->id)) {
            Session::flash('success', 'Delete Post Success.');
        } else {
            Session::flash('error', 'Delete Post Fail.');
        }
        return redirect()->route('posts.index');
    }
}
