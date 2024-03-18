<?php

namespace App\Http\Requests\Admin;

use App\Video;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class VideoRequest extends FormRequest
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
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'link' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title_en.required' => 'Please enter the title in english',
            'title_ar.required' => 'Please enter the title in arabic',
            'description_en.required' => 'Please enter the description in english',
            'description_ar.required' => 'Please enter the description in arabic',
            'link.required' => 'Please enter video link'
        ];
    }

    public function save($id)
    {
        $video = new Video();

        $video->service_id = $id;
        $video->link = $this->link;

        if ($video->save()){
            $video->details()->create([
                'title' => $this->title_en,
                'description' => $this->description_en,
                'lang' => 'en'
            ]);

            $video->details()->create([
                'title' => $this->title_ar,
                'description' => $this->description_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $video = Video::find($id);

        $video->link = $this->link;

        $video->save();

        $video->english()->update([
            'title' => $this->title_en,
            'description' => $this->description_en
        ]);

        $video->arabic()->update([
            'title' => $this->title_ar,
            'description' => $this->description_ar
        ]);
    }
}
