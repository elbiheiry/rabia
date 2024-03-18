<?php

namespace App\Http\Requests\Admin;

use App\ProjectImage;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class ProjectImageRequest extends FormRequest
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
        $rules['image'] = 'image|max:2048';
        
        return $rules;
    }

    public function messages()
    {        
        $messages['image.image'] = 'You should choose image not file';
        $messages['image.max'] = 'Maximum size allowed for image is 4MB';

        return $messages;
    }

    public function save($id)
    {
        $images = $this->file;
        if (!is_array($images)) {
            $images = [$images];
        }

        for($i = 0; $i < count($images) ;$i++)
        {
            $photo = $images[$i];

            $photo->store('projects');

            $image = new ProjectImage();
            $image->image = $photo->hashName();

            Image::make(storage_path('uploads/projects/' . $photo->hashName()))
               ->resize(622, 322)
               ->encode('png', 100)
               ->save(storage_path('uploads/projects/' . $photo->hashName()));

            $image->project_id = $id;

            $image->save();
            
        }
    }

    public function edit($id){
        $image = ProjectImage::find($id);

        @unlink(storage_path('uploads/projects')."/{$image->image}");
        $this->image->store('projects');
        $image->image = $this->image->hashName();
        Image::make(storage_path('uploads/projects/' . $this->image->hashName()))
            ->resize(622, 322)
           ->encode('png', 100)
           ->save(storage_path('uploads/projects/' . $this->image->hashName()));

        $image->save();
    }
}
