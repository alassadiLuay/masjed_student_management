<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Awqaf extends Model
{
    
    
    protected $fillable = [
        "test_name",
        "date",
        "place",
        "tester_name",
    
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
        return url('/admin/awqafs/'.$this->getKey());
    }

    
}
