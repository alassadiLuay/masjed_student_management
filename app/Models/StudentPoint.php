<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentPoint extends Model
{
    
    
    protected $fillable = [
        'student_id',
        'point_id',
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/student-points/'.$this->getKey());
    }

    
}
