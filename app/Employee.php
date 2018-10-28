<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = ['id'];

    public function scopeGetEmployee(){
    	return DB::table('employees')->get();    
    }

    public static function insertNewEmployee($data){
    	$employee = new Employee;
    	$employee->name = $data['name'];
    	$employee->type = $data['type'];
    	$employee->building_id = $data['building'];
    	$employee->save();
        return $employee->id;
    } 
}