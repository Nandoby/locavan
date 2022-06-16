<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Comment;
use App\Models\Memory;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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


    public function myBookings()
    {
        if (!Auth::check()) {
           return redirect()->route('login');
        }

        $user = User::find(Auth::id());

        return view('booking.my-bookings', ['user' => $user]);

    }

    public function show(Request $request,$id)
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $booking = Booking::find($id);

        // Je vérifie que je suis bien l'utilisateur de la réservation
        if ($booking->user->id !== Auth::id()) {
            return abort(404);
        }



        // Je vérifie si j'ai déjà commenté la réservation
        $hasComment = DB::table('comments')
            ->where('comments.vehicle_id', $booking->vehicle->id)
            ->where('comments.user_id', Auth::id())
            ->get();







        // J'enregistre l'id du booking selectionné dans la session pour sécuriser le formulaire plus tard
        $request->session()->put('booking_id', $booking->id);

        return view('booking.show', [
            'booking' => $booking,
            'hasComment' => $hasComment
        ]);
    }

    public function storeComment(Request $request)
    {

        // Je récupère le model Booking à partir de l'id stocké en session
        $booking = Booking::find($request->session()->get('booking_id'));
        $vehicleId = $booking->vehicle->id;

        $inputs = $request->all();
        $rules = [
            'content' => 'required',
            'memories[]' => 'mimes:jpg,png,gif',
        ];
        $messages = [
            'content.required' => 'Veuillez ajouter un commentaire',
            'memories.mimes' => 'Veuillez uploader uniquement des fichiers de type JPG, PNG, GIF',
        ];

        // Je m'assure que les données sont valides
        $validator = Validator::make($inputs, $rules, $messages);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $comment = new Comment([
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
            'vehicle_id' => $vehicleId,
            'user_id' => Auth::id(),
        ]);

        $comment->save();


        if ($request->hasFile('memories')) {
            $files = $request->file('memories');


            foreach($files as $file) {
                $path = Storage::disk('public')->put('images', $file);

                $memory = new Memory([
                    'comment_id' => $comment->id,
                    'path' => $path,
                ]);

                $memory->save();
            }

            return redirect()->back();

        }




//        $comment->save();

        // Je vide ma variable de session
//        $request->session()->remove('booking_id');

    }


}
