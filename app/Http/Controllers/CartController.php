<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart',
            ['title' => 'Cart',
                "main_section_title" => "Cart",
                "cart_menu_link_active" => "active",
            ]);
    }
}
