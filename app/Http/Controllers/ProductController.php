<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function __construct() {
        if (!Auth::check() || Auth::user()->role != "Admin") {
            abort(403, 'Unauthorized action.');
        }
    }

    public function index(Request $request)
    {
        return $this->reload($request);
    }

    public function edit($id) : JsonResponse
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function save(Request $request)
    {
        if ($request->input('id') == "0") {
            $product = Product::create([
                                "status" => $request->input('status'),
                                "category_id" => $request->input('category_id'),
                                'name' => $request->input('name'),
                                'quantity' => $request->input('quantity'),
                                'price' => $request->input('price'),
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
            $product = Product::findOrFail($request->input('id'));

            $product->update([
                            "status" => $request->input('status'),
                            "category_id" => $request->input('category_id'),
                            'name' => $request->input('name'),
                            'quantity' => $request->input('quantity'),
                            'price' => $request->input('price'),
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
        $filter_by_status = $request->input('filter_by_status', "Enabled");
        $filter_by_order = $request->input('filter_by_order', "name asc");
        $filter_by_orderArray = explode(" ", $filter_by_order);
        $filter_by_category_id = $request->input('filter_by_category_id', "0");

        if (intval($filter_by_category_id) > 0) {
            $category = Category::find(intval($filter_by_category_id));
            $products = Product::where("category_id", $category->id)->get();
            $filter_by_status = $category->status;
        }
        else {
            if ($filter_by_status == "Both") {
                $products = Product::where("status", "Enabled")->orWhere("status", "Deleted")->orderBy($filter_by_orderArray[0], $filter_by_orderArray[1])->get();
            } else {
                $products = Product::where("status", $filter_by_status)->orderBy($filter_by_orderArray[0], $filter_by_orderArray[1])->get();
            }
        }

        return view('product.product',
            ['products' => $products,
             "filter_by_status" => $filter_by_status,
             "filter_by_order" => $filter_by_order,
             "filter_by_category_id" => $filter_by_category_id,
             "all_categories" => Category::orderBy('name', 'asc')->get()
        ]);

    }

    /**
     * Delete the user's account
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
