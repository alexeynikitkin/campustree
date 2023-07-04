<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('status')->paginate(8);
        return view('admin.post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->cat_id = $request->cat_id;
        $post->img = $request->img;
        $post->event_time = $request->event_time;
        $arr1 = explode('/', $request->event_date);
        $newDate = $arr1[2] . '-' . $arr1[1] . '-' . $arr1[0];
        $post->event_date = $newDate;
        $post->status = 0;
        $post->location = $request->location;
        $post->map = $request->map;
        $post->banner = $request->banner;
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect()->back()->withSuccess('Post was successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->text = $request->text;
        $post->cat_id = $request->cat_id;
        $post->img = $request->img;
        $post->event_time = $request->event_time;
        $arr1 = explode('/', $request->event_date);
        $newDate = $arr1[2] . '-' . $arr1[1] . '-' . $arr1[0];
        $post->event_date = $newDate;
        $post->status = 0;
        $post->location = $request->location;
        $post->map = $request->map;
        $post->banner = $request->banner;
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect()->back()->withSuccess('Post was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->deleteOrFail();
        return redirect()->back()->withSuccess('Post was successfully deleted');
    }
}
