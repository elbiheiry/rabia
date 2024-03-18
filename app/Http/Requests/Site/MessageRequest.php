<?php

namespace App\Http\Requests\Site;

use App\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $result = ['status' => 'error' ,'data' => $validator->errors()->all()];

        throw new HttpResponseException(response()->json($result , 200));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => app()->getLocale() == 'en' ? 'Please enter your name' : 'برجاء ادخال الاسم بالكامل',
            'email.required' => app()->getLocale() == 'en' ? 'Please enter your email' : 'برجاء ادخال بريدك الالكتروني ',
            'phone.required' => app()->getLocale() == 'en' ? 'Please enter your phone number': 'برجاء ادخال رقم الهاتف ',
            'subject.required' => app()->getLocale() == 'en' ? 'Please enter your message subject' : 'برجاء ادخال عنوان الرساله',
            'message.required' => app()->getLocale() == 'en' ? 'Please enter your message ' : 'برجاء ادخال الرساله'
        ];
    }

    public function store()
    {
        $message = new Message();

        $message->name = $this->name;
        $message->email = $this->email;
        $message->phone = $this->phone;
        $message->subject = $this->subject;
        $message->message = $this->message;

        $message->save();
    }
}
