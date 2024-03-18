<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\ContactRequest;
use App\Http\Requests\Site\MessageRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //
    public function getIndex()
    {
        return view('site.pages.contact.index');
    }

    public function postIndex(MessageRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => app()->getLocale() == 'en' ? ['Thanks for your message , we will contact you soon'] : ['شكرا لك علي رسالتك سيتم التواصل معكم لاحقا']];
    }
}
