<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PWDInfo;

class CivilStatus extends Model
{
    protected $table = 'civstatus';
    protected $guarded = [];

    public function pwdinfos(){
        return $this->hasMany(PWDInfo::class);
    }
}
