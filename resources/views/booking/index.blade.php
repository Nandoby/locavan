@extends('app')

@section('title')
    LOCAVAN | Réserver
@endsection

@section('content')
    @include('partials.header')
    <section class="bg-white py-4">
        <div class="container mx-auto">
            <h1 class="text-2xl font-medium">Détails de votre réservation</h1>
            <div class="flex mt-4">
                <div class="md:w-6/12 text-gray-700">
                    <p>
                        <span class="font-medium text-gray-900">Type :</span> {{ $vehicle->type->name }}
                    </p>
                    <p>
                        <span class="font-medium text-gray-900">Modèle :</span> {{ $vehicle->model }}
                    </p>
                    <p>
                        <span class="font-medium text-gray-900">Localisation du véhicule</span> : {{ $vehicle->city }}
                    </p>
                    <p><span class="font-medium text-gray-900">Prix / jour : </span> {{ $vehicle->getPrice() }} &euro;</p>

                    <hr class="w-1/2 border-gray-400 my-3">
                    <p><span class="font-medium text-gray-900">Départ le :</span> {{ $startDate }}</p>
                    <p><span class="font-medium text-gray-900">Retour le :</span> {{ $endDate }}</p>
                    <hr class="w-1/2 border-gray-400 my-3">

                    <p><span class="font-medium text-gray-900">Durée de votre séjour : </span>{{ $numberOfDays }} jour(s) </p>
                    <hr class="w-1/2 border-gray-400 my-3">
                    <p><span class="font-medium text-gray-900">Total à payer : </span>{{ $vehicle->price * $numberOfDays }} &euro; </p>
                    <form class="mt-4 flex gap-3" action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <button class="px-4 py-2 bg-amber-500 rounded font-medium hover:bg-amber-600 text-base" type="submit">Confirmer</button>
                        <a href="{{ url()->previous() }}" class="py-2 px-4 bg-neutral-400 rounded font-medium text-base hover:bg-neutral-500">Retour</a>
                        <input type="hidden" name="start_date" value="{{ $startDate }}">
                        <input type="hidden" name="end_date" value="{{ $endDate }}">
                        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                    </form>
                </div>
                <img src="{{ $vehicle->pictures[0]->path }}" class="md:w-6/12 aspect-video rounded shadow">
            </div>
        </div>
    </section>
@endsection
