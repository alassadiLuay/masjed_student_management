<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Studnet;
use App\Models\Course;
class CourseStudent extends Model
{
    
    
    protected $fillable = [
        "class_id",
        "course_id",
        "student_id"
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/course-students/'.$this->getKey());
    }

    function courseStudent(){
        return $this->belongsTo(Studnet::class,'student_id');
    }

    function courseDetails(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
