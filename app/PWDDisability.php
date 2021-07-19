<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PWDInfo;

class PWDDisability extends Model
{
    protected $table = 'pwddisabilities';

    protected $fillable =[
        'disability_id', 'p_w_d_info_id', 'disability_name'
    ];

    protected $casts = [
        'disability_name' => 'array'
    ];



    public function pwdinfos(){
        return $this->belongsTo(PWDInfo::class);
    }
}
