<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    
    
    protected $fillable = [
        "user_id",
        "teacher_name",
        "teacher_address",
        "teacher_study",
        "teacher_speciality",
        "teacher_work",
        "teacher_extras",
        "teacher_note",
        "teacher_mobile",
        "teacher_phone",
        "birthdate",
        "username",
        "password",
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "birthdate",
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/teachers/'.$this->getKey());
    }

    
}
