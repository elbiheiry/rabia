<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProjectImage;
use App\Project;
use App\Http\Requests\Admin\ProjectImageRequest;
use Image;

class ProjectImageController extends Controller
{
    //
    public function getIndex($id)
    {
        $images = Project::find($id)->images()->orderBy('id', 'DESC')->get();

        return view('admin.pages.projects.gallery', compact('images', 'id'));
    }

    public function getInfo($id)
    {
        $image = ProjectImage::find($id);

        return view('admin.pages.projects.templates.gallery_edit', compact('image'));
    }

    public function postIndex(ProjectImageRequest $request, $id)
    {
        $request->save($id);

        $images = Project::find($id)->images()->orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.projects.templates.gallery_table', compact('images'))->render()];

    }

    public function postEdit(ProjectImageRequest $request, $id)
    {

        $request->edit($id);

        $images = Project::find(ProjectImage::find($id)->value('project_id'))->images()->orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.projects.templates.gallery_table', compact('images'))->render()];
    }

    public function postDelete(Request $request, $id)
    {
        if (!$request->image_id) {
            return ['status' => 'error', 'data' => ['You must select one image at least']];
        } else {
            foreach ($request->image_id as $image_id) {
                $image = ProjectImage::find($image_id);

                @unlink(storage_path('uploads/projects') . "/{$image->image}");
                $image->delete();

            }
            $images = Project::find($id)->images()->orderBy('id', 'DESC')->get();

            return ['status' => 'success', 'html' => view('admin.pages.projects.templates.gallery_table', compact('images'))->render()];
        }
    }
}
