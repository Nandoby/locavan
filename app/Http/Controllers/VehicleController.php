<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{

    public function show($id)
    {
        $vehicle = Vehicle::find($id);


        return view('vehicle.show', [
            'vehicle' => $vehicle,
        ]);
    }

    public function vehicles()
    {
        $vehicles = Vehicle::all();

        return view('vehicle.vehicles', [
            'vehicles' => $vehicles,
        ]);
    }


}
