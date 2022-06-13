<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function show($id)
    {
        $vehicle = Vehicle::find($id);


        return view('vehicle.show', [
            'vehicle' => $vehicle,
        ]);
    }
}
