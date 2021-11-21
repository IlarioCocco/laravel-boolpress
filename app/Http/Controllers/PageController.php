<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() 
    {
        return view("guest.welcome");
        //ci restituisce la welcome page (welcome.blade.php)
    }
}