<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class pageController extends Controller
{

    public function indexPage(){
        $posts = DB::table('posts')->join('categories','posts.category_Id','categories.id')
        ->select('posts.*','categories.name')->paginate(3);
        return view('pages.index',compact('posts'));
    }

    public function aboutPage(){
        return view('pages.about');
    }

    public function blogPage(){
        return view('pages.blog');
    }

    public function contactPage(){
        return view('pages.contact');
    }

    public function studentPage(){
        return view('pages.student');
    }

}
