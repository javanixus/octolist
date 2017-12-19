<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function admin()
    {
        return view('admin');
    }
}
