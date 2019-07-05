<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherCourse extends Model
{
    
    
    protected $fillable = [
        "teacher_id",
        "course_id",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/teacher-courses/'.$this->getKey());
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
