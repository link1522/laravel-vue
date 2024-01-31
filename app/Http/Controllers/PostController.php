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
        $posts = PostResource::collection(Post::all());
        return Inertia::render('post/all', compact('posts'));
    }

    public function json()
    {
        return PostResource::collection(Post::all());
    }

    public function create(): Response
    {
        return Inertia::render('post/create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        Post::create($request->validated());

        return redirect()->route('posts.index');
    }
}
