<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $guarded = ['id'];

    public function scopeGetBuildings(){
    	return DB::table('buildings')->get();    
    }

    public static function insertNewBuilding($data){
    	$building = new Building;
    	$building->name = $data['name'];
    	$building->numberOfFloors = $data['no_floors'];
        $building->numberOfElevators = $data['no_elevators'];
        if($data['parking'] == -1)
            $building->parking_lot_id = -1;
        else
    	   $building->parking_lot_id = $data['parking'];
    	$building->save();
        return $building->id;
    } 
}
