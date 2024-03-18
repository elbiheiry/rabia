<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTrans extends Model
{
    //
    protected $fillable = ['name' , 'description1' ,'description2' , 'description3','image_title' ,'lang'];
}
