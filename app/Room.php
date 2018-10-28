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
    public static function insertRoom($data){
	    	$room = new Room;
	    	$room ->name = $data['name'];
	    	$room ->floor_id = $data['floor'];
	    	$room ->type = $data['type'];
	    	$room->save();
	        return $room->id;
	}
}
