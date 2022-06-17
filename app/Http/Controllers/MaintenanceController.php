<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function menu()
    {
        return view('menu_maintenance');
    }
}
