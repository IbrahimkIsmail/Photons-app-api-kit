<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\FcmTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;
use App\Http\Resources\RecipeResource;
use App\Http\Resources\CategoryResource;

class CommonController extends Controller
{

    use FcmTrait;


    public function homepage()
    {
        $data['categories'] = Category::query()->where('status', 'on')->type('47')->where('deleted_at', NULL)->with('recipes')->get();
        $data['featured'] = RecipeResource::collection(Recipe::where('featured',1)->orderBy('created_at', 'DESC')->get());
        return response()->json([
            'data' => $data
        ]);
    }

    public function parents(Request $request)
    {
        $query = Category::query()->where('status', 'on')->whereNull('parent_id')->where('deleted_at', NULL);
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->get();
        return CategoryResource::collection($data);
    }

    public function kitchens(Request $request)
    {
        $query = Category::query()->where('status', 'on')->type('46')->where('deleted_at', NULL);
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return CategoryResource::collection($data);
    }

    public function categories(Request $request)
    {
        $query = Category::query()->where('status', 'on')->type('47')->where('deleted_at', NULL);
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return CategoryResource::collection($data);
    }

    public function occasions(Request $request)
    {
        $query = Category::query()->where('status', 'on')->type('38')->where('deleted_at', NULL);
        $search = strtolower($request->get('search', false));
        if ($search) {
            $query = $query->where(function ($query) use ($search) {
                return $query->whereRaw('lower(name) like (?)', ["%{$search}%"])
                    ->orwhereRaw('lower(id) like (?)', ["%{$search}%"]);
            });
        }
        $data = $query->paginate(25);
        return CategoryResource::collection($data);
    }


    public function test(){
        
      return  $this->generateDeebLink('ibrahim');

    }
}
