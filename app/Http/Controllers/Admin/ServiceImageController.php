<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServiceImage;
use App\Service;
use App\Http\Requests\Admin\ServiceImageRequest;
use Image;

class ServiceImageController extends Controller
{
    //
    public function getIndex($id)
    {
        $images = Service::find($id)->images()->orderBy('id', 'DESC')->get();

        return view('admin.pages.services.gallery', compact('images', 'id'));
    }

    public function getInfo($id)
    {
        $image = ServiceImage::find($id);

        return view('admin.pages.services.templates.gallery_edit', compact('image'));
    }

    public function postIndex(ServiceImageRequest $request, $id)
    {
        $request->save($id);

        $images = Service::find($id)->images()->orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.services.templates.gallery_table', compact('images'))->render()];

    }

    public function postEdit(ServiceImageRequest $request, $id)
    {

        $request->edit($id);

        $images = Service::find(serviceImage::find($id)->value('service_id'))->images()->orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.services.templates.gallery_table', compact('images'))->render()];
    }

    public function postDelete(Request $request, $id)
    {
        if (!$request->image_id) {
            return ['status' => 'error', 'data' => ['You must select one image at least']];
        } else {
            foreach ($request->image_id as $image_id) {
                $image = ServiceImage::find($image_id);

                @unlink(storage_path('uploads/services') . "/{$image->image}");
                $image->delete();

            }
            $images = Service::find($id)->images()->orderBy('id', 'DESC')->get();

            return ['status' => 'success', 'html' => view('admin.pages.services.templates.gallery_table', compact('images'))->render()];
        }
    }
}
