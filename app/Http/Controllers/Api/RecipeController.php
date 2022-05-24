<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recipes(Request $request)
    {
        $query =  Recipe::query();
        $query->when($request->kitchen_id, function ($query,$request) {
            $query->where('kitchen_id',$request->kitchen_id);
        })
        ->when($request->category_id, function ($query,$request) {
            $query->where('category_id',$request->category_id);
        })
        ->when($request->kitchen_id, function($query,$request) {
            $query->where('occasion_id',$request->occasion_id);
        });
        return RecipeResource::collection($query->orderBy('created_at', 'DESC')->get());
    }
    
    public function featured_recipes(){

        return RecipeResource::collection(Recipe::where('featured',1)->orderBy('created_at', 'DESC')->get());
        
    }
    
}
