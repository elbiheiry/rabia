<?php

namespace App\Http\Requests\Admin;

use App\Project;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class ProjectRequest extends FormRequest
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
            'image' => \Request::route()->getName() == 'admin.projects' ? 'required|max:4048' : 'max:4048' ,
            'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'brief_ar' => 'required',
            'brief_en' => 'required',
            'service_id' => 'not_in:0',
            'filter_id' => 'not_in:0',
        ];
    }

    public function messages()
    {
        return  [
            'name_ar.required' => 'Please enter project title in arabic',
            'name_en.required' => 'Please enter project title in english',
            'description_ar.required' => 'Please enter project description in arabic',
            'description_en.required' => 'Please enter project description in english',
            'brief_ar.required' => 'Please enter project brief in arabic',
            'brief_en.required' => 'Please enter project brief in english',
            'service_id.not_in' => 'Please select project service',
            'filter_id.not_in' => 'Please select project type',
            'image.required' => \Request::route()->getName() == 'admin.projects' ? 'Please enter project main image' : '',
            'image.max' => 'Maximum size allowed for image in 4 MB',
        ];

    }

    public function store()
    {
        $project = new Project();

        $this->image->store('projects');
        $project->image = $this->image->hashName();

        Image::make(storage_path('uploads/projects/' . $this->image->hashName()))
            ->resize(372, 370)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/projects/' . $this->image->hashName()));

        $project->slug = str_slug($this->name_en);
        $project->service_id = $this->service_id;
        $project->filter_id = $this->filter_id;

        if ($project->save()){
            $project->details()->create([
                'name' => $this->name_ar,
                'description' => $this->description_ar,
                'brief' => $this->brief_ar,
                'lang' => 'ar'
            ]);

            $project->details()->create([
                'name' => $this->name_en,
                'description' => $this->description_en,
                'brief' => $this->brief_en,
                'lang' => 'en'
            ]);
        }

    }

    public function edit(Project $project)
    {
        if ($this->image) {
            @unlink(storage_path('uploads/projects/')."/{$project->image}");
            $this->image->store('projects');
            $project->image = $this->image->hashName();
            Image::make(storage_path('uploads/projects/' . $this->image->hashName()))
                ->resize(372, 370)
                ->encode('jpg', 100)
                ->save(storage_path('uploads/projects/' . $this->image->hashName()));
        }

        $project->service_id = $this->service_id;
        $project->filter_id = $this->filter_id;

        $project->save();

        $project->arabic()->update([
            'name' => $this->name_ar,
            'description1' => $this->description1_ar,
            'description' => $this->description_ar,
            'brief' => $this->brief_ar,
        ]);

        $project->english()->update([
            'name' => $this->name_en,
            'description1' => $this->description1_en,
            'description' => $this->description_en,
            'brief' => $this->brief_en,
        ]);
    }
}
