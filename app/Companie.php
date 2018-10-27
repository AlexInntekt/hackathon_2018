<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    protected $guarded = ['id'];

    public static function insertNewCompany($data){
    	$company = new Companie;
    	$company->name = $data['name'];
    	$company->save();
    	return $company->id;
    }

    public function scopeGetCompanies(){
    	return DB::table('companies')->get();
    }
}
