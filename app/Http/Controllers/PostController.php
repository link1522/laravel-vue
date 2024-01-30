<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Inertia\Inertia;
use \Inertia\Response;

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
}
