<?php

namespace App\Http\Requests\Admin;

use App\Service;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class ServiceRequest extends FormRequest
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
            'image' => \Request::route()->getName() == 'admin.services' ? 'required|max:4048' : 'max:4048' ,
            'name_ar' => 'required',
            'name_en' => 'required',
            'brief_ar' => 'required',
            'brief_en' => 'required',
            'description1_ar' => 'required',
            'description1_en' => 'required'
        ];
    }

    public function messages()
    {
        return  [
            'name_ar.required' => 'Please enter service title in arabic',
            'name_en.required' => 'Please enter service title in english',
            'description1_ar.required' => 'Please enter service first description in arabic',
            'description1_en.required' => 'Please enter service first description in english',
            'brief_ar.required' => 'Please enter a brief about this service in arabic',
            'brief_en.required' => 'Please enter a brief about this service in english',
            'image.required' => \Request::route()->getName() == 'admin.services' ? 'Please enter service main image' : '',
            'image.max' => 'Maximum size allowed for image in 4 MB'
        ];

    }

    public function store()
    {
        $service = new Service();

        $this->image->store('services');
        $service->image = $this->image->hashName();

        Image::make(storage_path('uploads/services/' . $this->image->hashName()))
            ->resize(870, 584)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/services/' . $this->image->hashName()));

        $service->slug = str_slug($this->name_en);
        $service->parent_id = $this->parent_id;

        if ($service->save()){
            $service->details()->create([
                'name' => $this->name_ar,
                'description1' => $this->description1_ar,
                'description2' => $this->description2_ar,
                'features' => $this->features_ar,
                'brief' => $this->brief_ar,
                'lang' => 'ar'
            ]);

            $service->details()->create([
                'name' => $this->name_en,
                'description1' => $this->description1_en,
                'description2' => $this->description2_en,
                'features' => $this->features_en,
                'brief' => $this->brief_en,
                'lang' => 'en'
            ]);
        }

    }

    public function edit(Service $service)
    {
        $service->parent_id = $this->parent_id;

        if ($this->image) {
            @unlink(storage_path()."/{$service->image}");
            $this->image->store('services');
            $service->image = $this->image->hashName();

            Image::make(storage_path('uploads/services/' . $this->image->hashName()))
                ->resize(870, 584)
                ->encode('jpg', 100)
                ->save(storage_path('uploads/services/' . $this->image->hashName()));
        }

        $service->save();

        $service->arabic()->update([
            'name' => $this->name_ar,
            'description1' => $this->description1_ar,
            'description2' => $this->description2_ar,
            'features' => $this->features_ar,
            'brief' => $this->brief_ar,
        ]);

        $service->english()->update([
            'name' => $this->name_en,
            'description1' => $this->description1_en,
            'description2' => $this->description2_en,
            'features' => $this->features_en,
            'brief' => $this->brief_en,
        ]);
    }
}
