<?php

namespace App\Http\Requests\Admin;

use App\Slider;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SliderRequest extends FormRequest
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
            'image' => \Request::route()->getName() == 'admin.sliders' ? 'required|max:4048' : 'max:4048' ,
        ];
    }

    public function messages()
    {
        return  [
            'image.required' => \Request::route()->getName() == 'admin.sliders' ? 'Please enter slider image' : '',
            'image.max' => 'Maximum size allowed for image in 4 MB',
        ];
    }

    public function store()
    {
        $slider = new Slider();

        $this->image->store('sliders');
        $slider->image = $this->image->hashName();

        $slider->save();
    }

    public function edit($id)
    {
        $slider = Slider::find($id);

        if ($this->image) {
            @unlink(storage_path('uploads/sliders/')."{$slider->image}");
            $this->image->store('sliders');
            $slider->image = $this->image->hashName();
        }
    }
}
