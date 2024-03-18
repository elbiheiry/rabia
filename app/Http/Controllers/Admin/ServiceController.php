<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceRequest;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //
    public function getIndex()
    {
        $services = Service::orderBy('id', 'DESC')->get();
        $main_services = Service::get();

        return view('admin.pages.services.index', compact('services', 'main_services'));
    }

    public function getInfo(Service $service)
    {
        $main_services = Service::get();

        return view('admin.pages.services.edit', compact('service', 'main_services'));
    }

    public function postIndex(ServiceRequest $request)
    {
        $request->store();

        $services = Service::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.services.templates.table', compact('services'))->render()];
    }

    public function postEdit(ServiceRequest $request, Service $service)
    {
        $request->edit($service);

        $services = Service::orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.services.templates.table', compact('services'))->render()];
    }

    public function getDelete(Service $service)
    {
        $service->delete();

        return redirect()->back();

    }
}
