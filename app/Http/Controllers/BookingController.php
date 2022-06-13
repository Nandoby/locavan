<?php

namespace App\Http\Controllers;

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



}
