<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SliderRequest;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    //
    public function getIndex()
    {
        $sliders = Slider::orderBy('id', 'DESC')->get();

        return view('admin.pages.sliders.index', compact('sliders'));
    }

    public function getInfo($id)
    {
        $slider = Slider::find($id);

        return view('admin.pages.sliders.edit', compact('slider'));
    }

    public function postIndex(SliderRequest $request)
    {
        $request->store();

        $sliders = Slider::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.sliders.templates.table', compact('sliders'))->render()];
    }

    public function postEdit(SliderRequest $request, $id)
    {
        $request->edit($id);

        $sliders = Slider::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.sliders.templates.table', compact('sliders'))->render()];
    }

    public function getDelete($id)
    {
        $slider = Slider::find($id);

        $slider->delete();

        return redirect()->back();

    }
}
