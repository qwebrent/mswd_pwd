<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PWDInfo;

class Educbg extends Model
{
    protected $table = 'educbg';
    protected $guarded = [];

    public function pwdinfos(){
        return $this->hasMany(PWDInfo::class);
    }
}
