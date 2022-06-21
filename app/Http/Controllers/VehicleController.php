<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Type;
use App\Models\Vehicle;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{

    /**
     * Permet d'afficher un véhicule par rapport à un ID
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);


        return view('vehicle.show', [
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * Permet d'afficher tous les véhicules
     *
     * @return Application|Factory|View
     */
    public function vehicles()
    {
        $vehicles = Vehicle::all();

        return view('vehicle.vehicles', [
            'vehicles' => $vehicles,
        ]);
    }

    /**
     * Permet d'afficher le formulaire pour créer une annonce
     *
     */
    public function create()
    {
        $types = Type::all();


        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            return view('vehicle.new', [
                'types' => $types
            ]);
        }

    }

    public function store(Request $request)
    {


        $validated = $request->validate([
            'model' => ['required', 'max:50'],
            'type' => ['required'],
            'price' => ['required', 'numeric'],
            'year' => ['required', 'numeric', 'digits:4'],
            'length' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'width' => ['required', 'numeric',],
            'km' => ['required', 'numeric'],
            'city' => ['required', 'alpha', 'max:50'],
            'clean_water' => ['required', 'numeric'],
            'waste_water' => ['required', 'numeric'],
            'seats' => ['required', 'numeric'],
            'beds' => ['required', 'numeric'],
            'animals' => ['required', 'boolean'],
            'travel_abroad' => ['required', 'boolean'],
            'description' => ['required'],
            'pictures' => ['required'],
            'pictures.*' => ['mimes:jpg,jpeg,png', 'max:4000'],
        ]);






        $vehicle = new Vehicle([
            'model' => $request->model,
            'type_id' => $request->type,
            'price' => $request->price,
            'year' => $request->year,
            'length' => $request->length,
            'height' => $request->height,
            'width' => $request->width,
            'km' => $request->km,
            'city' => $request->city,
            'clean_water' => $request->clean_water,
            'waste_water' => $request->waste_water,
            'seats' => $request->seats,
            'beds' => $request->beds,
            'animals' => $request->animals,
            'travel_abroad' => $request->travel_abroad,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        $vehicle->save();

        if ($request->hasFile('pictures')) {


            $files = $request->file('pictures');

            foreach ($files as $file) {
                $path = Storage::disk('public')->put('images', $file);
                $pictures = new Picture([
                    'title' => 'montitre',
                    'path' => $path,
                    'vehicle_id' => $vehicle->id,
                ]);

                $pictures->save();
            }

            return redirect()->back();
        }

        return redirect()->back();
    }

    public function myAds()
    {

        $user = \App\Models\User::find(auth()->id());

        $vehicles = $user->vehicles;

        if (!auth()->check()) {
            return redirect()->route('login');
        }

        return view('vehicle.myAds', [
            'vehicles' => $vehicles,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('city');
        $vehicles = Vehicle::query()->where('city', 'LIKE', '%'.$search.'%')->get();

        return view('vehicle.vehicles', [
            'vehicles' => $vehicles,
            'request' => $request->input('city')
        ]);

    }

}
