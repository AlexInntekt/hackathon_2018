<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = ['id'];

    public function scopeGetBookings(){
    	return DB::table('booking')->get();
    }

    public static function insertNewBooking($data){
    	$booking = new Booking;
    	$booking->room_id = $data['room'];
    	$booking->start_time = $data['start_time'];
    	$booking->end_time = $data['end_time'];
    	$booking->status = 'pending';
    	$booking->save();
    }
}
