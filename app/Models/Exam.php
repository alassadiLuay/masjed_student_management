<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Exam extends Model
{
    
    
    protected $fillable = [
        "course_id",
        "exam_name",
        "exam_max_num",
        "exam_min_num",
    
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
        return url('/admin/exams/'.$this->getKey());
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'exam_id');
    }

}
