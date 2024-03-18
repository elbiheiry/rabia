<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\CareerRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    //
    public function getIndex()
    {
        return view('site.pages.careers.index');
    }

    public function postIndex(CareerRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => app()->getLocale() == 'en' ? ['Thank you , we will contact you very soon'] : ['شكرا لك سيتم التواصل معكم في اقرب وقت ممكن']];
    }
}
