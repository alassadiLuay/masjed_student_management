<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PointType;

class PointConfig extends Model
{
    
    
    protected $fillable = [
        "point_type_id",
        "point_name",
        "point_value",
        "notes",
    
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
        return url('/admin/point-configs/'.$this->getKey());
    }

    public function pointType()
    {
        return $this->belongsTo(PointType::class,'point_type_id');
    }
}
