<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    function show(){
        return view('admin.pages.orders.show');
    }
}
