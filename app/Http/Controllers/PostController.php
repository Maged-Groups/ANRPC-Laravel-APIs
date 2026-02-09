<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        $posts_collection = PostResource::collection($posts);

        return $posts_collection;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post_data = $request->validated(); // returns an array

        // get the logged in user id
        $user_id = auth()->user()->id;

        // Add the user_id to the $post_data array
        $post_data['user_id'] = $user_id;

        // Insert $post_data into the Database table (posts)        
        $new_post = Post::create($post_data);
        
        return $new_post;

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = $post->load('comments', 'user', 'postStatus');

        $post_resource = PostResource::make($post);

        return $post_resource;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
