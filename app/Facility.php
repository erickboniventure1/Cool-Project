<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
    	'ipc_leader_id', 
    	'district_id', 
    	'region_id', 
    	'name', 
    	'description',
    	'status',
    ];
    public function district(){
    	return $this->belongsTo('App\District');

    }
    
    public function region(){
    	return $this->belongsTo('App\Region');
    }
    
    public function ipcLeader(){
    	return $this->belongsTo('App\IpcLeader');
    }
    
    public function staff(){
    	return $this->hasMany('App\Staff');
    }
    
}
