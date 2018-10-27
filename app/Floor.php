<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $guarded = ['id'];

    public function scopeGetFloors(){
    	return DB::table('floors')->get(); 
    }

    public static function updateFloors($floors){
    	for($i=0;$i<count($floors);$i++){
	    	$floor = Floor::find($floors[$i]);
			$floor->status = 1;
			$floor->save();
		}
    }

    public static function insertNewFloors($noFloors, $building_id){
    	for($i=0;$i<=$noFloors;$i++){
    		$floor = new Floor;
    		$floor->building_id = $building_id;
    		$floor->number = $i;
    		$floor->save();
    	}
    }
}
