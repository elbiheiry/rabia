<?php

namespace App\Http\Requests\Admin;

use App\WorkFilter;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class WorkFilterRequest extends FormRequest
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
            'name_en' => 'required',
            'name_ar' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'Please enter filter name in arabic',
            'name_ar.required' => 'Please enter filter name in english'
        ];
    }

    public function store()
    {
        $filter = new WorkFilter();
        
        $filter->parent_id = $this->parent_id;

        if ($filter->save()){
            $filter->details()->create([
                'name' => $this->name_en,
                'lang' => 'en'
            ]);

            $filter->details()->create([
                'name' => $this->name_ar,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id)
    {
        $filter = WorkFilter::find($id);

        $filter->arabic()->update([
            'name' => $this->name_ar
        ]);

        $filter->english()->update([
            'name' => $this->name_en
        ]);
    }
}
