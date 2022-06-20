@php

    if (\Carbon\Carbon::now() > $booking->end_date) {
        $status = '<span class="bg-green-100 text-green-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">terminé</span>';
    } else {
        $status = '<span class="bg-yellow-100 text-yellow-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">en cours</span>';
    }

@endphp


@extends('app')

@section('title')
    Locavan | Réservation - {{ $booking->vehicle->type->name }} {{ $booking->vehicle->model }}
@endsection

@section('content')
    @include('partials.header')
    <div class="container mx-auto p-4 min-h-screen">
        <h1 class="font-bold text-2xl my-4">Détails de votre réservation</h1>
        <div class="shadow border border-gray-300 rounded overflow-hidden">
            <div class="bg-white p-4 border border-b-gray-300">
                <p><b>Status</b> : {!! $status !!}</p>
            </div>
            <div class="bg-gray-50 p-4">
                <p class="my-4">Votre séjour s'est terminé le <span
                        class="font-medium">{{ \Carbon\Carbon::make($booking->end_date)->format('d/m/Y') }}</span></p>
                <p>
                    <b>Modèle : </b>{{ $booking->vehicle->model }}
                </p>
                <p><b>Type : </b>{{ $booking->vehicle->type->name }}</p>
                <p><b>Année : </b>{{ $booking->vehicle->year }}</p>
                <p><b>Km avant réservation : </b>{{ number_format($booking->vehicle->km, 0, ',', ' ') }} km</p>
                <p><b>Description : </b>{{ $booking->vehicle->description }}</p>

                @if (\Carbon\Carbon::now() > $booking->end_date)

                    @if(count($hasComment) > 0)
                        @foreach($hasComment as $comment)
                            <p class="text-sm font-bold mb-3 mt-4">Commentaire du {{ \Carbon\Carbon::make($comment->created_at)->format('d/m/Y') }}</p>

                            <div class="w-full bg-white mt-4 border border-gray-300 p-4">
                                {{ $comment->content }}
                            </div>
                        @endforeach

                    @else
                        <h3 class="mt-4 font-medium text-xl">Ajouter un commentaire pour décrire votre séjour</h3>

                        <form class="mt-4" action="{{ route('booking.store.comment', ['booking_id' => $booking->id]) }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="comment" class="block text-sm font-bold mb-2" for="comment">Commentaire</label>
                            <textarea id="comment" name="content" placeholder="Votre commentaire..." rows="4"
                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-amber-500 focus:border-amber-500"></textarea>
                            @error('content')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            <label for="rating" class="block text-sm font-medium my-2 text-gray-900">Note</label>
                            <select id="rating" name="rating"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>

                            <h3 class="my-4 font-medium text-xl">Photos de votre séjour</h3>

                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                   for="multiple_files">Uploader un ou plusieurs fichiers</label>
                            <input
                                class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none"
                                id="multiple_files" type="file" multiple name="memories[]">
                            @error('memories')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror


                            <button type="submit"
                                    class="block py-2 px-2 text-sm bg-green-500 rounded text-white mt-3 hover:bg-green-600">
                                Envoyer
                            </button>
                        </form>

                    @endif

                    @else

                    <p class="mt-4 bg-yellow-100 text-yellow-700 text-md font-medium py-3 px-2 text-center rounded-lg">Vous pourrez commenter votre séjour dès que celui-ci sera terminé.</p>

                @endif
            </div>


        </div>

    </div>
@endsection
