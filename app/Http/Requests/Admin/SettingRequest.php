<?php

namespace App\Http\Requests\Admin;

use App\Setting;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SettingRequest extends FormRequest
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
            'brief' => 'required',
            'brief_ar' => 'required',
            'address_ar' => 'required',
            'address_en' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter site name',
            'brief.required' => 'Please enter site description in english',
            'brief_ar.required' => 'Please enter site description in arabic',
            'address_ar.required' => 'Please enter address in arabic',
            'address_en.required' => 'Please enter address in english',
            'phone.required' => 'Please enter site phone number',
            'email.required' => 'Please enter site email address',

        ];
    }

    public function edit()
    {
        $settings = Setting::first();

        $settings->name = $this->name;
        $settings->brief = $this->brief;
        $settings->brief_ar = $this->brief_ar;
        $settings->address_en = $this->address_en;
        $settings->address_ar = $this->address_ar;
        $settings->phone = $this->phone;
        $settings->email = $this->email;
        $settings->facebook = $this->facebook;
        $settings->twitter = $this->twitter;
        $settings->youtube = $this->youtube;

        $settings->save();
    }
}
