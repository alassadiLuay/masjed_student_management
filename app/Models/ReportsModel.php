<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReportsModel extends Model
{
    //
    static function teachers(){
    	return DB::table('teachers')->get()->toArray();
    }

	static function semesters(){
    	return DB::table('semesters')->get()->toArray();
    }

    static function courses(){
    	return DB::table('courses')->get()->toArray();
    }  

    static function attend_data($selected_date){
		$originalDate = $selected_date;
		$newDate = date("d-m-Y", strtotime($originalDate));
		return DB::table('student_attendances')->join('studnets','studnets.id','=','student_id')->whereRaw("DATE_FORMAT(created_at, '%d-%m-%Y') = ".$newDate.")")->get()->toArray();
	}
}
