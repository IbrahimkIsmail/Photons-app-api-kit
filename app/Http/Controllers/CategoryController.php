<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('pages.category.index');
    }

    public function load(Request $request)
    {
        $categories = Category::query()->whereNotNull('parent_id');

        $search = $request->get('search', false);
        if ($search) {
            $categories = $categories->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
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
        return DataTables::make($categories)
            ->addColumn('created_at', function ($categories) {
                return Carbon::parse($categories->created_at)->toDateString();
            })
            ->addColumn('name', function ($categories) {
                return $categories->name;
            })->addColumn('icon', function ($categories) {
                return $categories->icon;
            })->addColumn('parent', function ($categories) {
                return $categories->parent->name;
            })
            ->addColumn('actions', function ($city) {
                return null;
            })
            ->make();
    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['status'] = $request['status'] == "on" ? 'on' : 'off';
        if ($request->hasFile('icon')) {
            $flag_image = $request->file('icon');
            $data['icon'] = uploadFileImage($flag_image, 'category/icons');
        }
        $item = Category::query()->create($data);
        if ($item) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;
    }

    public function edit($id)
    {
        $category = Category::query()->findOrFail($id);
        return view('pages.category.edit',['category' => $category]);
    }

    public function update(CategoryRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('icon')) {
            $flag_image = $request->file('icon');
            $data['icon'] = uploadFileImage($flag_image, 'category/icons');
        }
        $category = Category::query()->findOrFail($request->get('id'))->update($data);
        if ($category) {
            $return = ["result" => "ok", "message" => admin("Edit Operation Successfully")];
        }else{
            $return = ["result" => "error", "message" => admin("Edit Operation Failed")];
        }
        return $return;
    }

    public function destroy(Request $request)
    {
        $data = Category::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        if ($data->delete()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }


    public function disable(Request $request)
    {
        $data = Category::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'off';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
    }

    public function activate(Request $request)
    {
        $data = Category::query()->findOrFail($request->get('id'));
        if (!$data) return response(["msg" => "not found"], 404);
        $data->status = 'on';
        if ($data->save()) {
            return response(["msg" => "success"], 200);
        } else {
            return response(["msg" => "error"], 400);
        }
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
        $data = $query->paginate(25);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }
}
