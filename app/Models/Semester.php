<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    
    
    protected $fillable = [
        "semester_name",
        "description",
        "started_at",
        "end_at",
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
        return url('/admin/semesters/'.$this->getKey());
    }

    
}
