<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProjectRequest;
use App\Project;
use App\Service;
use App\WorkFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    //
    public function getIndex()
    {
        $projects = Project::orderBy('id', 'DESC')->get();
        $filters = WorkFilter::all();
        $services = Service::all();

        return view('admin.pages.projects.index', compact('projects', 'filters', 'services'));
    }

    public function getInfo(Project $project)
    {
        $filters = WorkFilter::all();
        $services = Service::all();

        return view('admin.pages.projects.edit', compact('project', 'filters', 'services'));
    }

    public function postIndex(ProjectRequest $request)
    {
        $request->store();

        $projects = Project::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.projects.templates.table', compact('projects'))->render()];
    }

    public function postEdit(ProjectRequest $request, project $project)
    {
        $request->edit($project);

        $projects = Project::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.projects.templates.table', compact('projects'))->render()];
    }

    public function getDelete(Project $project)
    {
        $project->delete();

        return redirect()->back();

    }
}
