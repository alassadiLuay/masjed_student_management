<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    
    
    protected $fillable = [
    'school_name',
    'class_name'
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
    
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/student-classes/'.$this->getKey());
    }

    
}
