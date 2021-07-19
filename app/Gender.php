<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\PWDInfo;

class Gender extends Model
{
    protected $table = 'gender';
    protected $guarded = [];

    public function pwdinfos(){
        return $this->hasMany(PWDInfo::class);
    }
}
