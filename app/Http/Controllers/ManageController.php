<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function Home()
    {
        return view('manage.home');
    }
}
