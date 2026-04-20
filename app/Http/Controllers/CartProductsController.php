<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class CartProductsController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::where("status", "Enabled")->orderBy("name", "asc")->get();

        return view("cart-products",
                    ['title' => 'Home',
                    "main_section_title" => "Cart",
                    "cart_section_title" => "Cart products",
                    "products_menu_link_active" => "active",
                    "products" => $products
                    ]
                );
    }

    public function details($productId)
    {
        $product = Product::where("id", $productId)->where("status", "Enabled")->first();
        $category = Category::where("id", $product->category_id)->where("status", "Enabled")->first();

        return view("cart-product-details",
                    [   'title' => 'Cart',
                        "main_section_title" => "Cart",
                        "cart_section_title" => "Cart product details",
                        "category" => $category,
                        "product" => $product
                    ]
                );
    }
}
