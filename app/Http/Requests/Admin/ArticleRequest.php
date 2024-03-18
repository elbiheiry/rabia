<?php

namespace App\Http\Requests\Admin;

use App\Article;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class ArticleRequest extends FormRequest
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
            'image' => \Request::route()->getName() == 'admin.articles' ? 'required|max:4048' : 'max:4048' ,
            'inner_image' => \Request::route()->getName() == 'admin.articles' ? 'required|max:4048' : 'max:4048',
            'name_ar' => 'required',
            'name_en' => 'required',
            'description1_ar' => 'required',
            'description1_en' => 'required'
        ];
    }

    public function messages()
    {
        return  [
            'name_ar.required' => 'Please enter article title in arabic',
            'name_en.required' => 'Please enter article title in english',
            'description1_ar.required' => 'Please enter article first description in arabic',
            'description1_en.required' => 'Please enter article first description in english',
            'image.required' => \Request::route()->getName() == 'admin.articles' ? 'Please enter article main image' : '',
            'inner_image.required' => \Request::route()->getName() == 'admin.articles' ? 'Please enter article inner image' : '',
            'image.max' => 'Maximum size allowed for image in 4 MB',
            'inner_image.max' => 'Maximum size allowed for image in 4 MB'
        ];

    }

    public function store()
    {
        $article = new Article();

        $this->image->store('articles');
        $article->image = $this->image->hashName();

        Image::make(storage_path('uploads/articles/' . $this->image->hashName()))
            ->resize(360, 226)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/articles/' . $this->image->hashName()));


        $this->inner_image->store('articles');
        $article->inner_image = $this->inner_image->hashName();

        Image::make(storage_path('uploads/articles/' . $this->inner_image->hashName()))
            ->resize(1082, 439)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/articles/' . $this->inner_image->hashName()));

        $article->slug = str_slug($this->name_en);

        if ($article->save()){
            $article->details()->create([
                'name' => $this->name_ar,
                'description1' => $this->description1_ar,
                'description2' => $this->description2_ar,
                'description3' => $this->description3_ar,
                'lang' => 'ar'
            ]);

            $article->details()->create([
                'name' => $this->name_en,
                'description1' => $this->description1_en,
                'description2' => $this->description2_en,
                'description3' => $this->description3_en,
                'lang' => 'en'
            ]);
        }

    }

    public function edit(Article $article)
    {
        if ($this->image) {
            @unlink(storage_path('uploads/articles/')."{$article->image}");
            $this->image->store('articles');
            $article->image = $this->image->hashName();

            Image::make(storage_path('uploads/articles/' . $this->image->hashName()))
                ->resize(360, 226)
                ->encode('jpg', 100)
                ->save(storage_path('uploads/articles/' . $this->image->hashName()));
        }

        if ($this->inner_image) {
            @unlink(storage_path('uploads/articles/')."{$article->inner_image}");
            $this->inner_image->store('articles');
            $article->inner_image = $this->inner_image->hashName();

            Image::make(storage_path('uploads/articles/' . $this->inner_image->hashName()))
                ->resize(1082, 439)
                ->encode('jpg', 100)
                ->save(storage_path('uploads/articles/' . $this->inner_image->hashName()));

        }

        $article->save();

        $article->arabic()->update([
            'name' => $this->name_ar,
            'description1' => $this->description1_ar,
            'description2' => $this->description2_ar,
            'description3' => $this->description3_ar,
        ]);

        $article->english()->update([
            'name' => $this->name_en,
            'description1' => $this->description1_en,
            'description2' => $this->description2_en,
            'description3' => $this->description3_en,
        ]);
    }
}
