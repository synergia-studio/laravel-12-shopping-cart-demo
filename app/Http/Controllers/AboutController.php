<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about',
            ['title' => 'About Us',
                "main_section_title" => "About Us",
                "about_menu_link_active" => "active"
            ]);
    }
}
