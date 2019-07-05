<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    
    
    protected $fillable = [
        'exam_id',
        'student_id',
        'course_student_id',
        'mark',
        'notes',
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/marks/'.$this->getKey());
    }

    function courseDetails(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
