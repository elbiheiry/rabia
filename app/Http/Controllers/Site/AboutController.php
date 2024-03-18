<?php

namespace App\Http\Controllers\Site;

use App\About;
use App\Certificate;
use App\HomeSection;
use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //
    public function getIndex()
    {
        $abouts = About::all();
        $certificates = Certificate::all();
        $partners = Partner::all();
        $sections = HomeSection::all();

        return view('site.pages.about.index' ,compact('abouts','certificates','partners','sections'));
    }
}
