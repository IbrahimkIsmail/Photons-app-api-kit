<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;
class CommonController extends Controller
{
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
        $data = $query->paginate(25);
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
}
