<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentNote extends Model
{
    
    
    protected $fillable = [
        'notes',
        'student_id'
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/student-notes/'.$this->getKey());
    }

    
}
