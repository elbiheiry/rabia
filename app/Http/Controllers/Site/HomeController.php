<?php

namespace App\Http\Controllers\Site;

use App\About;
use App\Article;
use App\Certificate;
use App\HomeSection;
use App\Partner;
use App\Project;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function getIndex()
    {
        $sliders = Slider::all();
        $about1 = About::find(1);
        $about2 = About::find(6);
        $sections = HomeSection::all();
        $projects = Project::take(6)->get();
        $blogs = Article::take(3)->get();
        $certificates = Certificate::all();
        $partners = Partner::all();

        return view('site.pages.index' ,compact('sliders','about1' ,'about2' ,'certificates' ,'sections','projects','blogs','partners'));
    }
}
