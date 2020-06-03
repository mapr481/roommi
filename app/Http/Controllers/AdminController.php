<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class AdminController extends Controller
{    
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('Master.Main');
    }

    public function users()
    {
        return view('Master.User');
    }

}

