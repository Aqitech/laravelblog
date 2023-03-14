<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
        $tags = Tag::all();
        if ($categories->count() == 0 || $tags->count() == 0) {
            Session::flash('warning', 'Plase Add At Least One Category And Tag Before Adding The Post!');
            return redirect()->back();
        }
        return view('admin.posts.create')->with(compact('title','categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $this->validate($request, [
            'title' => 'required|max:255',
            'feature_image' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
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
        $post->tags()->attach($request->tags);
        
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
        $title = 'Edit Post';
        $post = Post::find($id);
        $categories = Category::all(); 

        return view('admin.posts.edit')->with(compact('title','post','categories'));
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
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('feature_image')) {
            $feature_image = $request->feature_image;
            $feature_image_new_name = time().$feature_image->getClientOriginalName();
            $feature_image->move('uploads/posts', $feature_image_new_name);
            $post->feature_image = $feature_image_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        Session::flash('success', 'Post Update Successfuly!');
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('error', 'Your Post Just Trashed!');
        return redirect()->back();
    }

    public function trash()
    {
        $title = 'Trashed Posts';
        $posts = Post::onlyTrashed()->get();

        return view('admin/posts/trash')->with(compact('title','posts'));
    }

    public function kill($id)
    {
       $post = Post::withTrashed()->where('id', $id)->first();
       $post->forceDelete();

       Session::flash('error', 'Post Delete Permanently!');
       return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('success', 'Post Restore Successfuly!');
        return redirect()->route('posts');
    }
}
