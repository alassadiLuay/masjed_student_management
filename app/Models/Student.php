<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseStudnet;

class Student extends Model
{
    
    
    protected $fillable = [
        "student_fname",
        "student_lname",
        "student_father_name",
        "student_address",
        "student_father_job",
        "student_nationality",
        "father_phone",
        "student_phone",
        "home_phone",
        "transportation",
        "student_photo",
        "note",
        "status",
        "has_id",
        "student_birthdate",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "student_birthdate",
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/students/'.$this->getKey());
    }

    function studentCourses(){
        return $this->hasMany(CourseStudnet::class,'student_id');
    }
}
