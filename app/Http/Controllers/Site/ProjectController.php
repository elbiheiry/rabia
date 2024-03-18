<?php

namespace App\Http\Controllers\Site;

use App\HomeSection;
use App\Project;
use App\WorkFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    //
    public function getIndex()
    {
        $filters = WorkFilter::where('parent_id' , 0)->orderBy('id' , 'DESC')->get();

        return view('site.pages.projects.newprojects',compact('filters')); /* to test the new page ..  */
    }

    public function getProject($slug)
    {
        $project = Project::where('slug' , $slug)->first();
        $section = HomeSection::find(5);

        return view('site.pages.projects.single' ,compact('project' ,'section'));
    }
}
