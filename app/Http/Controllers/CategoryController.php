<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function __construct() {
        if (Auth::check() && Auth::user()->role == "Client") {
            abort(403, 'Unauthorized action.');
        }
    }


    public function index(Request $request)
    {
        return $this->reload($request);
    }

    public function edit($id) : JsonResponse
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    public function save(Request $request)
    {
        if ($request->input('id') == "0") {
            $category = Category::create([
                                "status" => $request->input('status'),
                                'name' => $request->input('name'),
                                'description' => $request->input('description'),
                                'browser_title' => "",
                                'page_title' => "",
                                'seo_meta_title' => "",
                                'seo_meta_subject' => "",
                                'seo_meta_description' => "",
                                'seo_meta_keywords' => "",
                                'created_user_id' => 1,
                                'updated_user_id' => 1
                            ]);
        } else {
            $category = Category::findOrFail($request->input('id'));

            $category->update([
                            "status" => $request->input('status'),
                            'name' => $request->input('name'),
                            'description' => $request->input('description'),
                            'browser_title' => "",
                            'page_title' => "",
                            'seo_meta_title' => "",
                            'seo_meta_subject' => "",
                            'seo_meta_description' => "",
                            'seo_meta_keywords' => "",
                            'created_user_id' => 1,
                            'updated_user_id' => 1
                        ]);
        }
        return $this->reload($request);
    }


    public function reload(Request $request)
    {
        $filter_by_status = "Enabled";
        if ($request->exists('filter_by_status')) {
            $filter_by_status = $request->input('filter_by_status');
        }

        $filter_by_order = "name asc";
        if ($request->exists('filter_by_order')) {
            $filter_by_order = $request->input('filter_by_order');
        }
        $filter_by_orderArray = explode(" ", $filter_by_order);

        $filter_by_category_id = "0";
        if ($request->exists('filter_by_category_id')) {
            $filter_by_category_id = $request->input('filter_by_category_id');
        }

        if (intval($filter_by_category_id) > 0) {
            $category = Category::find(intval($filter_by_category_id));
            $categories = [$category];
            $filter_by_status = $category->status;
        }
        else {
            if ($filter_by_status == "Both") {
                $categories = Category::where("status", "Enabled")->orWhere("status", "Deleted")->orderBy($filter_by_orderArray[0], $filter_by_orderArray[1])->get();
            } else {
                $categories = Category::where("status", $filter_by_status)->orderBy($filter_by_orderArray[0], $filter_by_orderArray[1])->get();
            }
        }

        return view('category.category',
            ['categories' => $categories,
             "filter_by_status" => $filter_by_status,
             "filter_by_order" => $filter_by_order,
             "filter_by_category_id" => $filter_by_category_id,
             "filter_all_categories" => Category::orderBy('name', 'asc')->get()
        ]);

    }

}
