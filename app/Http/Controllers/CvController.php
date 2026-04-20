<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CvController extends Controller
{
    public function index()
    {
        return view('cv',
                ['title' => 'Cv',
                 "main_section_title" => "Cv",
                 "cv_menu_link_active" => "active"
                ]
               );
    }
}
