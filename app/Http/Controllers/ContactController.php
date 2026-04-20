<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact',
            ['title' => 'Contact Us',
                "main_section_title" => "Contact Us",
                "contact_menu_link_active" => "active"
            ]);
    }
}
