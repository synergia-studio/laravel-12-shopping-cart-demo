<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        /*
        User::create([
            'name' => 'John',
            'email' => 'john@test.com',
            'password' => bcrypt('rakics98'),
        ]);
        */

        return view('home',
                ['title' => 'Home',
                 "main_section_title" => "Home",
                 "home_menu_link_active" => "active"
                ]
               );
    }

}
