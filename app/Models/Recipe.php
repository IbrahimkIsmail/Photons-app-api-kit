<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory,SoftDeletes;


    protected  $guarded = [];
    protected $casts = [
        'ingredients' => 'array',
        'prepares' => 'array',
    ];



    public function setPreparesAttribute($value)
    {
        $prepares = [];

        foreach ($value as $array_item) {
            if (!is_null($array_item['input'])) {
                foreach ($array_item as $item) {
                    $prepares[] = $item;
                }
                
            }
        }

        $this->attributes['prepares'] = json_encode($prepares);
    }

    public function setIngredientsAttribute($value)
    {
        $ingredients = [];
        foreach ($value as $array_item) {
            if (!is_null($array_item['input'])) {
                foreach ($array_item as $item) {
                    $ingredients[] = $item;
                }
                
            }
        }

        $this->attributes['ingredients'] = json_encode($ingredients);
    }
  
    public function kitchen()
    {
        return $this->belongsTo('App\Models\Category', 'kitchen_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function occasion()
    {
        return $this->belongsTo('App\Models\Category', 'occasion_id');
    }

}
