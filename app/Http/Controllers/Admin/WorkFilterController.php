<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\WorkFilterRequest;
use App\WorkFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkFilterController extends Controller
{
    //
    public function getIndex()
    {
        $filters = WorkFilter::orderBy('id', 'DESC')->get();

        return view('admin.pages.filter.index', compact('filters'));
    }

    public function getInfo($id)
    {
        $filter = WorkFilter::find($id);
        $filters = WorkFilter::where('parent_id' , 0)->get();

        return view('admin.pages.filter.templates.edit', compact('filter' ,'filters'));
    }

    public function postIndex(WorkFilterRequest $request)
    {
        $request->store();

        $filters = WorkFilter::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.filter.templates.table', compact('filters'))->render()];
    }

    public function postEdit(WorkFilterRequest $request, $id)
    {
        $request->edit($id);

        $filters = WorkFilter::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.filter.templates.table', compact('filters'))->render()];
    }

    public function getDelete($id)
    {
        $filter = WorkFilter::find($id);

        $filter->delete();

        return redirect()->back();

    }
}
