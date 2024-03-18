<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PartnerRequest;
use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    //
    public function getIndex()
    {
        $partners = Partner::orderBy('id', 'DESC')->get();

        return view('admin.pages.partners.index', compact('partners'));
    }

    public function getInfo($id)
    {
        $partner = Partner::find($id);

        return view('admin.pages.partners.edit', compact('partner'));
    }

    public function postIndex(PartnerRequest $request)
    {
        $request->store();

        $partners = Partner::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.partners.templates.table', compact('partners'))->render()];
    }

    public function postEdit(PartnerRequest $request, $id)
    {
        $request->edit($id);

        $partners = Partner::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.partners.templates.table', compact('partners'))->render()];
    }

    public function getDelete($id)
    {
        $partner = Partner::find($id);

        $partner->delete();

        return redirect()->back();

    }
}
