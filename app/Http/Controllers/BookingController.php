<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Request $request, $id)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $vehicle = Vehicle::find($id);

        // Calculer le nombre de jours entre deux dates
        $range = [];

        $start = \DateTime::createFromFormat('d/m/Y', $startDate)->getTimestamp();
        $end = \DateTime::createFromFormat('d/m/Y', $endDate)->getTimestamp();

        for ($current = $start; $current <= $end; $current += 86400) {
            $date = date('d/m/Y', $current);
            $range[] = $date;
        }

        $numberOfDays = count($range);

        if (Auth::check()) {

            if ($numberOfDays <= 0) {
                return redirect()->back();
            }

            // Je sauvegarde l'id de la voiture pour la confirmation
            $request->session()->put('vehicle_id', $id);


            return view('booking.index', [
                'startDate' => $startDate,
                'endDate' => $endDate,
                'vehicle' => $vehicle,
                'numberOfDays' => $numberOfDays,
            ]);


        } else {
            return redirect()->route('auth.login')->with('error', "Vous devez être connecté pour effectuer cette action");
        }

    }

    public function store(Request $request)
    {
        $user = Auth::id();
        $start_date = \DateTime::createFromFormat('d/m/Y', $request->start_date);
        $end_date = \DateTime::createFromFormat('d/m/Y', $request->end_date);
        $vehicle_id = $request->vehicle_id;

        // Ici je vérifie que la date de retour est supérieure à la date de départ
        if ($end_date < $start_date) {
            abort(500);
        }

        // Je vérifie que l'id du véhicule n'a pas été modifé au moment de la confirmation

        if ($vehicle_id !== $request->session()->get('vehicle_id')) {
            abort(500);
        }

        $booking = new Booking([
            'start_date' => $start_date,
            'end_date' => $end_date,
            'user_id' => Auth::id(),
            'vehicle_id' => $vehicle_id,
        ]);

        $booking->save();


        $request->session()->remove('vehicle_id');

        return redirect()->route('vehicle.show', ['id' => $vehicle_id])->with('success', 'Votre réservation a bien été prise en compte');

    }


}
