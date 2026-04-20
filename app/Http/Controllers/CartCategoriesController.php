<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class CartCategoriesController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::where("status", "Enabled")->orderBy("name", "asc")->get();

        return view("cart-categories",
                    ['title' => 'Home',
                    "main_section_title" => "Cart",
                    "cart_section_title" => "Cart categories",
                    "categories_menu_link_active" => "active",
                    "categories" => $categories
                    ]
                );
    }

    public function details($categoryid)
    {
        $category = Category::where("id", $categoryid)->where("status", "Enabled")->first();
        $products = Product::where("category_id", $categoryid)->where("status", "Enabled")->get();

        return view("cart-category-details",
                    [   'title' => 'Home',
                        "main_section_title" => "Cart",
                        "cart_section_title" => "Cart category details",
                        "category" => $category,
                        "products" => $products
                    ]
                );
    }

}
