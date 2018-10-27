<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Parking_lot extends Model
{
    protected $guarded = ['id'];

    public static function insertNewParkingLot($data){
    	$parking = new Parking_lot;
    	$parking->name = $data['name'];
    	$parking->number_of_parking_spaces = $data['parking_spaces'] + 0;
    	$parking->save();
    }

    public function scopeGetParkingLots(){
    	return DB::table('parking_lots')->get();    
    }
}
