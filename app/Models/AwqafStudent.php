<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AwqafStudent extends Model
{
    
    
    protected $fillable = [
        'student_id',
        'awqaf_id',
        'student_mark',
        'is_passed',
        'full_mark',
        'subject_type',
        'subject_id',
        'created_at'
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        'created_at'
    ];
    
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/awqaf-students/'.$this->getKey());
    }

    
}
