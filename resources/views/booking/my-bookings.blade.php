@extends('app')

@section('title')
    Locavan | Mes réservations
@endsection

@section('content')
    @include('partials.header')
    <section class="container mx-auto p-4">
        <h1 class="text-2xl font-bold my-4">Mes réservations</h1>


        @if (count($user->bookings) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-4 gap-y-4 justify-items-center">
            @foreach ($user->bookings as $book)
                <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
                    <a href="{{ route('booking.show', ['id' => $book->id]) }}">
                        <img class="rounded-t-lg" src="{{ $book->vehicle->pictures[0]->path }}">
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                {{ $book->vehicle->type->name }} {{ $book->vehicle->model }}
                            </h5>
                            <p class="mb-3 font-normal text-gray-700">
                                Réservation du {{ $book->created_at->format('d/m/Y') }}
                            </p>
                            <a href="{{ route('booking.show', ['id' => $book->id]) }}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-amber-600 rounded-lg hover:bg-amber-700 focus:ring-4 focus:ring-amber-300 focus:outline-none">
                                En savoir plus <i class="fa-solid fa-arrow-right ml-4"></i>
                            </a>
                        </a>
                    </div>
                </div>
            @endforeach
            </div>
        @else
            <p class="text-red-500">Vous n'avez pas encore effectué de réservations sur notre site.</p>
        @endif


    </section>
@endsection
