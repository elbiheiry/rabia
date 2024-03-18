<?php

namespace App\Http\Requests\Site;

use App\Candidate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CareerRequest extends FormRequest
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
            'mobile' => 'required',
            'gender' => 'not_in:0',
            'birthdate' => 'required',
            'country' => 'not_in:0',
            'city' => 'required',
            'fields' => 'required',
            'cv' => 'required|max:4048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => app()->getLocale() == 'en' ? 'Please enter your name' : 'برجاء ادخال الاسم بالكامل',
            'email.required' => app()->getLocale() == 'en' ? 'Please enter your email' : 'برجاء ادخال بريدك الالكتروني ',
            'phone.required' => app()->getLocale() == 'en' ? 'Please enter your phone number': 'برجاء ادخال رقم الهاتف ',
            'mobile.required' => app()->getLocale() == 'en' ? 'Please enter your mobile number': 'برجاء ادخال رقم الجوال',
            'gender.not_in' => app()->getLocale() == 'en' ? 'Please enter your gender': 'برجاء اختيار النوع',
            'birthdate.required' => app()->getLocale() == 'en' ? 'Please enter your birthdate': 'برجاء ادخال تاريخ الميلاد',
            'country.not_in' => app()->getLocale() == 'en' ? 'Please enter your country': 'برجاء اختيار الدوله',
            'city.required' => app()->getLocale() == 'en' ? 'Please enter your city': 'برجاء ادخال اسم المدينه',
            'fields.required' => app()->getLocale() == 'en' ? 'Please enter your fields of expert': 'برجاء اختيار مجالات العمل المقدم لها' ,
            'cv.required' => app()->getLocale() == 'en' ? 'Please upload your cv' : 'برجاء تحميل السيره الذاتيه الخاصه بك',
            'cv.max' => app()->getLocale() == 'en' ? 'Maximum size allowed for CV is 4MB' : 'اقصي حجم متاح للسيره الذاتيه هو 4 ميجابايت'
        ];
    }

    public function store()
    {
//        dd($this->fields);
        $career = new Candidate();

        $career->name = $this->name;
        $career->email = $this->email;
        $career->phone = $this->phone;
        $career->mobile = $this->mobile;
        $career->gender = $this->gender;
        $career->birthdate = $this->birthdate;
        $career->country = $this->country;
        $career->city = $this->city;
        $career->fields = implode("," , $this->fields);

        $this->cv->store('careers');
        $career->cv = $this->cv->hashName();

        $career->save();
    }
}
