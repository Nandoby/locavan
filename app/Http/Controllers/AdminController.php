<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Comment;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());

        $users = User::all();
        $vehicles = Vehicle::all();
        $bookings = Booking::all();
        $comments = Comment::all();

        if (!$user->is_admin) {
            return redirect()->route('home');
        }

        return view('admin.index', [
            'users' => $users,
            'vehicles' => $vehicles,
            'bookings' => $bookings,
            'comments' => $comments
        ]);
    }

    public function users()
    {
        $isAdmin = User::find(Auth::id());
        $users = User::all();

        if (!$isAdmin->is_admin) {
            return redirect()->route('home');
        }

        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function vehicles()
    {
        $isAdmin = User::find(Auth::id());
        $vehicles = Vehicle::all();

        if (!$isAdmin->is_admin) {
            return redirect()->route('home');
        }

        return view('admin.vehicles', [
            'vehicles' => $vehicles
        ]);
    }

    public function comments()
    {
        $isAdmin = User::find(Auth::id());
        $comments = Comment::all();

        if (!$isAdmin->is_admin) {
            return redirect()->route('home');
        }

        return view('admin.comments', [
            'comments' => $comments
        ]);
    }

}
