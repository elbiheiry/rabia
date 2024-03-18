<?php

namespace App\Http\Controllers\Site;

use App\Certificate;
use App\CertificateType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
    //
    public function getIndex()
    {
//        $certificates = Certificate::all();
        $types = CertificateType::all();

        return view('site.pages.certificates.index' ,compact('types'));
    }
}
