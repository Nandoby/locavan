<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::query()->take(3)->orderBy('created_at', 'desc')->get();

        return view('home', [
            'vehicles' => $vehicles
        ]);
    }
}
