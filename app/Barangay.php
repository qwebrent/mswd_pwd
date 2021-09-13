<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PWDInfo;
Use App\Senior;

class Barangay extends Model
{
    protected $table = 'barangay';
    protected $guarded = [];

    public function pwdinfos(){
        return $this->hasMany(PWDInfo::class);
    }

    public function seniorinfos(){
        return $this->hasMany(Senior::class);
    }
}
