<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    protected $guarded = ['id'];

    public function scopeGetRooms(){
    	return DB::table('rooms')->get();
    }
    public static function insertRoom($data, $floor_id){
    		dd($data);
	    	$room = new Room;
	    	$room ->floor_id = $floor_id;
	    	$room ->type = $data['type'];

	    	$room->save();
	        return $room->id;
		
	}
}
