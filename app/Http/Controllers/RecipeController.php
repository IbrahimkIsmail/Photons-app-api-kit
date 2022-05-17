<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\RecipeRequest;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Http\Traits\FcmTrait;

class RecipeController extends Controller
{
    use FcmTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.recipes.index');
    }
    public function load(Request $request)
    {
        $recipes = Recipe::query();

        $search = $request->get('search', false);
        if ($search) {
            $recipe = $recipes->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
                if (strpos('فعال', $search) !== false) {
                    $query->orwhere('status', 'on');
                }
                if (strpos('معطل', $search) !== false) {
                    $query->orwhere('status', 'like', '%' . 'off' . '%');
                }

            });
        }
        return DataTables::make($recipes)
            ->addColumn('created_at', function ($recipes) {
                return Carbon::parse($recipes->created_at)->toDateString();
            })
            ->addColumn('title', function ($recipes) {
                return $recipes->title;
            })->addColumn('kitchen', function ($recipes) {
                return @$recipes->kitchen->name;
            })->addColumn('category', function ($recipes) {
                return @$recipes->category->name;
            })->addColumn('occasion', function ($recipes) {
                return @$recipes->occasion->name;
            })->addColumn('actions', function ($recipes) {
                return null;
            })
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeRequest $request)
    {
         
        $data = $request->validated();
        $data['status'] = $request['status'] == "on" ? 'published' : 'unpublished';
        if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $data['main_image'] = uploadFileImage($main_image, 'recipes/main_images');
        }
        $item = Recipe::query()->create($data);
        $this->sendToTopic($item,'users');
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
           
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return  ["data"=>$recipe,"result" => "error", "message" => admin("Add Operation Failed")];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('pages.recipes.edit',['recipe' =>  $recipe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeRequest $request)
    {
        $data = $request->validated();
        $data['status'] = $request['status'] == "on" ? 'published' : 'unpublished';
        if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $data['main_image'] = uploadFileImage($main_image, 'recipes/main_images');
        }
        $recipe = Recipe::query()->findOrFail($request->get('id'))->update($data);
        if ($recipe) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        }else{
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Recipe::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }
    public function disable(Request $request)
    {
        $data = Recipe::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'unpublished';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function activate(Request $request)
    {
        $data = Recipe::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'published';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
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
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
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
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
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
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }



    


}
