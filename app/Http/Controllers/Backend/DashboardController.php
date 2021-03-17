<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getIndex (){
        return view ('Backend.Dashboard.dashboard');
    }
}
