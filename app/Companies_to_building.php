<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Companies_to_building extends Model
{
    protected $guarded = ['id'];

    public static function insertNewRelation($data,$company_id){
    	for($i=0;$i<count($data['floor']);$i++){
	    	$relation = new Companies_to_building;
	    	$relation->company_id = $company_id;
	    	$relation->floor_id = $data['floor'][$i];
	    	$relation->save();
    	}
    }
    public function scopeGetCompaniesToBuildings(){
    	return DB::table('companies_to_buildings')->get();    
    }
}
