<?php

namespace App\Http\Controllers\Site;

use App\Article;
use App\HomeSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    //
    public function getIndex()
    {
        $blogs = Article::orderBy('id' , 'DESC')->get();

        return view('site.pages.blogs.index' ,compact('blogs'));
    }

    public function getSingleBlog($slug)
    {
        $blog = Article::where('slug' , $slug)->first();
        $section = HomeSection::find(6);

        return view('site.pages.blogs.single' ,compact('blog' ,'section'));
    }
}
