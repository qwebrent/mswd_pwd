<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PWDInfo;

class Disability extends Model
{
    protected $table = 'disability';
    protected $guarded = [];

    public function pwdinfos(){
        return $this->hasMany(PWDInfo::class);
    }
}
