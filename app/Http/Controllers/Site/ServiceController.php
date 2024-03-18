<?php

namespace App\Http\Controllers\Site;

use App\HomeSection;
use App\Partner;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //
    public function getService($slug)
    {
        $service = Service::where('slug', $slug)->first();
        $partners = Partner::all();
        $sections = HomeSection::all();

        return view('site.pages.services.index', compact('service', 'partners', 'sections'));
    }
}
