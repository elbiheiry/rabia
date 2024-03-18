<?php

namespace App\Http\Controllers\Admin;

use App\HomeSection;
use App\Http\Requests\Admin\HomeSectionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeSectionController extends Controller
{
    //
    public function getIndex()
    {
        $sections = HomeSection::orderBy('id', 'DESC')->get();

        return view('admin.pages.sections.index', compact('sections'));
    }

    public function getInfo($id)
    {
        $section = HomeSection::find($id);

        return view('admin.pages.sections.edit', compact('section'));
    }

    public function postEdit(HomeSectionRequest $request, $id)
    {
        $request->edit($id);

        $sections = HomeSection::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.sections.templates.table', compact('sections'))->render()];
    }
}
