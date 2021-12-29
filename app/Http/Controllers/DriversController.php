<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriversController extends Controller
{
    function show(){
        return view('admin.pages.drivers.show');
    }
}
