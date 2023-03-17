<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class FrontEndController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $site_settings = Settings::first();
        $menu_categories = Category::take(5)->get();
        $first_post = Post::orderBy('created_at','desc')->first();
        $second_post = Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first();
        $wpcategory = Category::find(1);
        $phpcategory = Category::find(2);
        $laravelcategory = Category::find(3);

        return view('home')->with(compact('site_settings','title','first_post','second_post','third_post','menu_categories','phpcategory','wpcategory','laravelcategory'));
    }

    public function singlePost($slug)
    {
        $singlePost = Post::where('slug',$slug)->first();
        $title = $singlePost->title;
        $site_settings = Settings::first();
        $menu_categories = Category::take(5)->get();
        $next_id = Post::where('id','>',$singlePost->id)->min('id');
        $next = Post::find($next_id);
        $prev_id = Post::where('id','<',$singlePost->id)->max('id');
        $prev = Post::find($prev_id);
        $tags = Tag::all();

        return view('single')->with(compact('singlePost','title','site_settings','menu_categories','prev','next','tags'));
    }

    public function singleCategory($id)
    {
        $singleCategory = Category::find($id);
        $title = $singleCategory->title;
        $site_settings = Settings::first();
        $menu_categories = Category::take(5)->get();
        $tags = Tag::all();

        return view('category')->with(compact('singleCategory','title','site_settings','menu_categories','tags'));
    }

    public function singleTag($id)
    {
        $singleTag  = Tag::find($id);
        $title = $singleTag->tag;
        $site_settings = Settings::first();
        $menu_categories = Category::take(5)->get();
        $tags = Tag::all();

        return view('tag')->with(compact('singleTag','title','site_settings','menu_categories','tags'));
    }

    public function query()
    {
        $query = request('query');
        $posts = Post::where('title','like','%'. request('query') .'%')->get();
        $title = 'Search Result For' . request('query');
        $site_settings = Settings::first();
        $menu_categories = Category::take(5)->get();
        $tags = Tag::all();

        return view('result')->with(compact('query','posts','title','site_settings','menu_categories','tags'));
    }
}
