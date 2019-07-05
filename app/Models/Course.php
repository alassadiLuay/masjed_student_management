<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
    
    protected $fillable = [
        "semester_id",
        "course_name",
        "description",
        "started_at",
        "end_at",
        "session_number",
        "enabled",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "started_at",
        "end_at",
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/courses/'.$this->getKey());
    }

    public function exams()
    {
        return $this->hasMany(Exam::class,'course_id');
    }

    public function TeacherCourse()
    {
        return $this->hasMany(TeacherCourse::class,'course_id');
    }
}
