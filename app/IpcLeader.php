<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpcLeader extends Model
{
    protected $fillable = [
       'first_name',
       'last_name', 
       'phone_number',
       'device_sn',
       'device_imei', 
       'status', 
       'description',
    ];

    public function facilities(){
      return $this->hasMany('App\Facility');
    }
}
