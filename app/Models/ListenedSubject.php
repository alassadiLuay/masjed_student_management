<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListenedSubject extends Model
{
    
    
    protected $fillable = [
        "student_id",
        "student_course_id",
        "subject_id",
        "subject_type",
    
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
        return url('/admin/listened-subjects/'.$this->getKey());
    }

    
}
