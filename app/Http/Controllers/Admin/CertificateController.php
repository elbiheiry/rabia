<?php

namespace App\Http\Controllers\Admin;

use App\Certificate;
use App\CertificateType;
use App\Http\Requests\Admin\CertificateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
    //
    public function getIndex()
    {
        $certificates = Certificate::orderBy('id', 'DESC')->get();
        $types = CertificateType::all();

        return view('admin.pages.certificates.index', compact('certificates', 'types'));
    }

    public function getInfo($id)
    {
        $certificate = Certificate::find($id);
        $types = CertificateType::all();

        return view('admin.pages.certificates.edit', compact('certificate', 'types'));
    }

    public function postIndex(CertificateRequest $request)
    {
        $request->store();

        $certificates = certificate::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.certificates.templates.table', compact('certificates'))->render()];
    }

    public function postEdit(CertificateRequest $request, $id)
    {
        $request->edit($id);

        $certificates = certificate::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.certificates.templates.table', compact('certificates'))->render()];
    }

    public function getDelete($id)
    {
        $certificate = Certificate::find($id);

        $certificate->delete();

        return redirect()->back();

    }
}
