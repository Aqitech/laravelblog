<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Posts';
        $posts = Post::all();
        return view('admin.posts.index')->with(compact('title','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Post';
        $categories = Category::all();
        if ($categories->count() == 0) {
            Session::flash('warning', 'Plase Add At Least One Category Before Adding The Post!');
            return redirect()->back();
        }
        return view('admin.posts.create')->with(compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'feature_image' => 'required|image',
            'content' => 'required',
            'category_id' => 'required'
        ]);
        
        $feature_image = $request->feature_image;
        $feature_image_new_name = time().$feature_image->getClientOriginalName();
        $feature_image->move('uploads/posts', $feature_image_new_name);

        $post = Post::create([
            'title' => $request->title,
            'slug' => str::snake($request->title, '-'),
            'feature_image' => $feature_image_new_name,
            'content' => $request->content,
            'category_id' => $request->category_id
        ]);
        Session::flash('success', 'Post Created Successfuly!');

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
