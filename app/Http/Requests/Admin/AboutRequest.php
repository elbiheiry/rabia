<?php

namespace App\Http\Requests\Admin;

use App\About;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AboutRequest extends FormRequest
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
            'image' => $this->image ? 'max:4048' : '' ,
            'brochure' => $this->brochure ? 'max:4048' : '' ,
            'title_ar' => 'required',
            'title_en' => 'required',
            'description1_ar' => 'required',
            'description1_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.max' => $this->image ? 'Maximum size allowed for image is 4MB' : '',
            'brochure.max' => $this->brochure ? 'Maximum ize allowed for brochure is 4MB' : '',
            'title_ar.required' => 'Please enter title in arabic',
            'title_en.required' => 'Please enter title in english',
            'description1_ar.required' => 'Please enter description in arabic',
            'description1_en.required' => 'Please enter description in english'
        ];
    }

    public function edit($id)
    {
        $about = About::find($id);

        if ($this->image){
            @unlink(storage_path('uploads/about/')."{$about->image}");

            $this->image->store('about');
            $about->image = $this->image->hashName();
        }

        if ($this->brochure){
            @unlink(storage_path('uploads/about/')."{$about->brochure}");

            $this->brochure->store('about');
            $about->brochure = $this->brochure->hashName();
        }

        $about->save();

        $about->arabic()->update([
            'title' => $this->title_ar,
            'description1' => $this->description1_ar,
            'description2' => $this->description2_ar
        ]);

        $about->english()->update([
            'title' => $this->title_en,
            'description1' => $this->description1_en,
            'description2' => $this->description2_en
        ]);
    }
}
