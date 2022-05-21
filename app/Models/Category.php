<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    
    protected $fillable = ['name','status','icon','parent_id']; 


    public function scopeActive($query)
    {
        return $query->where('status', 'on');
    }
    public function scopeType($query,$id)
    {
        return $query->where('parent_id',$id);
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function recipes(){
        return $this->hasMany('App\Models\Recipe', 'category_id');
    }


}
