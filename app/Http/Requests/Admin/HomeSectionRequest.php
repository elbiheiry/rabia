<?php

namespace App\Http\Requests\Admin;

use App\HomeSection;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class HomeSectionRequest extends FormRequest
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
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title_ar.required' => 'Please enter title in arabic',
            'title_en.required' => 'Please enter title in english',
            'description_ar.required' => 'Please enter description in arabic',
            'description_en.required' => 'Please enter description in english'
        ];
    }

    public function edit($id)
    {
        $about = HomeSection::find($id);

//        $about->save();

        $about->arabic()->update([
            'title' => $this->title_ar,
            'description' => $this->description_ar
        ]);

        $about->english()->update([
            'title' => $this->title_en,
            'description' => $this->description_en
        ]);
    }
}
