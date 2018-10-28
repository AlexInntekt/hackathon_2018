<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $guarded = ['id'];

    public static function insertNewAlert($user_id, $complaint, $storage_path){
    	$alert = new Alert;
    	$alert->user_id = $user_id;
    	$alert->complaint = $complaint;
    	$alert->file_location = $storage_path;
    	$alert->save();
    }
}
