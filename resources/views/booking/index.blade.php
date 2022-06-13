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
                    <form class="mt-4">
                        <button class="px-4 py-2 bg-amber-500 rounded font-medium" type="submit">Confirmer</button>
                        <a href="{{ url()->previous() }}">Retour</a>
                    </form>
                </div>
                <img src="{{ $vehicle->pictures[0]->path }}" class="md:w-6/12 aspect-video rounded shadow">
            </div>
        </div>
    </section>
@endsection
