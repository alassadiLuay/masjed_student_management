<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PointConfig;
class PointType extends Model
{
    
    
    protected $fillable = [
        "type_name",
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
        return url('/admin/point-types/'.$this->getKey());
    }

    public function pointConf()
    {
        return $this->hasMany(PointConfig::class,'point_type_id');
    }
}
