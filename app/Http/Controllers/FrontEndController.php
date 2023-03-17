<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Category;
use App\Models\Post;

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

        return view('single')->with(compact('singlePost','title','site_settings','menu_categories'));
    }
}
