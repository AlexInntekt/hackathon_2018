<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking_lot_space extends Model
{
    protected $guarded = ['id'];

    public function scopeGetParkingSpaces(){
    	return DB::table('parking_lot_spaces')->get();
    }

    public static function insertParkingSpaces($data,$parking_lot_id){
    	for($i=1;$i<=$data['parking_spaces'];$i++){
    		$parking_space = new Parking_lot_space;
    		$parking_space->parking_lot_id = $parking_lot_id;
    		$parking_space->number = $i;
    		$parking_space->status = "free";
 			$parking_space->save();
    	}
    }
}
