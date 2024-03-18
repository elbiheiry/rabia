<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificateType extends Model
{
    //
    public function certificates()
    {
        return $this->hasMany('App\Certificate' , 'type');
    }
}
