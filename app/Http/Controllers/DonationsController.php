<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationsController extends Controller
{
    function show(){
        return view('admin.pages.donations.show');
    }
}
