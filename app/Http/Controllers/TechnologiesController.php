<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechnologiesController extends Controller
{
    public function index()
    {
        return view('technologies',
                ['title' => 'Technologies',
                 "main_section_title" => "Technologies",
                 "technologies_menu_link_active" => "active"
                ]
               );
    }
}
