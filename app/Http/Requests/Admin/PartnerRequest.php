<?php

namespace App\Http\Requests\Admin;

use App\Partner;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class PartnerRequest extends FormRequest
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
            'image' => \Request::route()->getName() == 'admin.partners' ? 'required|max:4048' : 'max:4048' ,
        ];
    }

    public function messages()
    {
        return  [
            'image.required' => \Request::route()->getName() == 'admin.partners' ? 'Please enter partner main image' : '',
            'image.max' => 'Maximum size allowed for image in 4 MB'
        ];
    }

    public function store()
    {
        $partner = new Partner();

        $this->image->store('partners');
        $partner->image = $this->image->hashName();

        Image::make(storage_path('uploads/partners/' . $this->image->hashName()))
            ->resize(130, 130)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/partners/' . $this->image->hashName()));

        $partner->save();
    }

    public function edit($id)
    {
        $partner = Partner::find($id);

        if ($this->image) {
            @unlink(storage_path()."/{$partner->image}");
            $this->image->store('partners');
            $partner->image = $this->image->hashName();

            Image::make(storage_path('uploads/partners/' . $this->image->hashName()))
                ->resize(130, 130)
                ->encode('jpg', 100)
                ->save(storage_path('uploads/partners/' . $this->image->hashName()));
        }

        $partner->save();

    }
}
