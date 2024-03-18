<?php

namespace App\Http\Requests\Admin;

use App\Certificate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;


class CertificateRequest extends FormRequest
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
            'image' => \Request::route()->getName() == 'admin.certificates' ? 'required|max:4048' : 'max:4048' ,
            'type' => 'not_in:0',
            'name_ar' => 'required',
            'name_en' => 'required',
            'destination_ar' => 'required',
            'destination_en' => 'required'
        ];
    }

    public function messages()
    {
        return  [
            'name_ar.required' => 'Please enter certificate title in arabic',
            'name_en.required' => 'Please enter certificate title in english',
            'destination_ar.required' => 'Please enter certificate source name in arabic',
            'destination_en.required' => 'Please enter certificate source name in english',
            'type.not_in' => 'Please select certificate type',
            'image.required' => \Request::route()->getName() == 'admin.certificates' ? 'Please enter certificate image' : '',
            'image.max' => 'Maximum size allowed for image in 4 MB',
        ];

    }

    public function store()
    {
        $certificate = new Certificate();

        $this->image->store('certificates');
        $certificate->image = $this->image->hashName();

        Image::make(storage_path('uploads/certificates/' . $this->image->hashName()))
            ->resize(600, 436)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/certificates/' . $this->image->hashName()));

        $certificate->type = $this->type;

        if ($certificate->save()){
            $certificate->details()->create([
                'name' => $this->name_ar,
                'destination' => $this->destination_ar,
                'lang' => 'ar'
            ]);

            $certificate->details()->create([
                'name' => $this->name_en,
                'destination' => $this->destination_en,
                'lang' => 'en'
            ]);
        }

    }

    public function edit($id)
    {
        $certificate = Certificate::find($id);
        if ($this->image) {
            @unlink(storage_path('uploads/certificates')."/{$certificate->image}");
            $this->image->store('certificates');
            $certificate->image = $this->image->hashName();
            Image::make(storage_path('uploads/certificates/'.$this->image->hashName()))
                ->resize(600, 436)
                ->encode('jpg', 100)
                ->save(storage_path('uploads/certificates/'.$this->image->hashName()));
        }

        $certificate->type = $this->type;

        $certificate->save();

        $certificate->arabic()->update([
            'name' => $this->name_ar,
            'destination' => $this->destination_ar,
        ]);

        $certificate->english()->update([
            'name' => $this->name_en,
            'destination' => $this->destination_en,
        ]);
    }
}
