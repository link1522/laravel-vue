<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function index(): Response
    {
        $this->authorize('viewAny', Post::class);
        $posts = PostResource::collection(Post::all());
        return Inertia::render('post/all', compact('posts'));
    }

    public function json()
    {
        return PostResource::collection(Post::all());
    }

    public function create(): Response
    {
        $this->authorize('create', Post::class);
        return Inertia::render('post/create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $this->authorize('create', Post::class);
        Post::create($request->validated());

        return redirect()->route('posts.index')->with('message', 'Post created successfully');
    }

    public function edit(Post $post): Response
    {
        $this->authorize('create', Post::class);
        return Inertia::render('post/edit', compact('post'));
    }

    public function update(Post $post, StorePostRequest $request): RedirectResponse
    {
        $this->authorize('create', Post::class);
        $post->update($request->validated());

        return redirect()->route('posts.index')->with('message', 'Post update successfully');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $this->authorize('create', Post::class);
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post delete successfully');
    }

}
