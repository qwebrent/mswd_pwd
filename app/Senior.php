<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Senior extends Model
{
    use SoftDeletes;

    protected $table = 'seniors';
    protected $fillable=[
        'lname',
        'fname',
          'mname',
           'reg_num',
           'height',
            'weight',
             'b_day',
         'gender_id',
      'civstatus_id',
        'mobile_num',
    'street_address',
       'barangay_id',
      'municipality',
          'province',
        'e_name',
          'e_contact',
          'e_address',
         'senior_illness',
         'status'
    ];

    public function barangay(){
        return $this->belongsTo(Barangay::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function civstatus(){
        return $this->belongsTo(CivilStatus::class);
    }

    public function getFullNameAttribute(){

        return $this-> lname . ',' . $this-> fname .' '. $this->mname;

    }

    public function getAge(){

        return Carbon::parse($this->attributes['b_day'])->age;

    }

    public function getFullAddress(){

        return $this-> street_address . ' ' . $this-> barangay -> barangay . ' ' . $this-> municipality .','. $this->province;

    }



}
