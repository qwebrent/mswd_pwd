<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PWDInfo extends Model
{
    protected $table = 'pwdinfos';
    protected $fillable=[
        'lname',
        'fname',
          'mname',
          'suffix',
           'reg_num',
           'sss_num',
       'phealth_num',
             'b_day',
         'gender_id',
      'civstatus_id',
         'educbg_id',
        'mobile_num',
    'street_address',
       'barangay_id',
      'municipality',
          'province',
        'emp_status',
          'emp_type',
          'pwd_file',
         'pwd_skill'
    ];

    protected $casts = [
        'disability_name' => 'array'
    ];

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function civstatus(){
        return $this->belongsTo(CivilStatus::class);
    }

    public function educbg(){
        return $this->belongsTo(Educbg::class);
    }

    public function barangay(){
        return $this->belongsTo(Barangay::class);
    }

    public function disability(){
        return $this->belongsTo(Disability::class);
    }


    public function disabilities(){
        return $this->hasMany(PWDDisability::class);
    }

    public function getFullNamePWD(){
        return $this-> lname . ', ' . $this-> fname .' '. $this->mname . ', ' . $this-> suffix;
    }

    public function getAge(){

        return Carbon::parse($this->attributes['b_day'])->age;

    }

}
