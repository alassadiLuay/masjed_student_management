<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    
    
    protected $fillable = [
        "created_at",
        "student_course_id",
        "student_id",
        "is_late"
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/student-attendances/'.$this->getKey());
    }

    
}
