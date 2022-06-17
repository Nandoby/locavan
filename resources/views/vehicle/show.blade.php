@extends('app')

@section('title')
    LOCAVAN | {{ $vehicle->model }}
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css"
          integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker-bs4.min.css">
@endsection

@section('content')
    @include('partials.header')

    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
             role="alert">
            {{ session('success') }}
        </div>
    @endif

    <main class="box-border">
        <div class="mx-auto p-0">
            <section class="container mx-auto mt-20 flex flex-col md:flex-row md:space-x-4 p-4">

                <!-- Left Column -->
                <div class="w-12/12 md:w-6/12">
                    <div class="slider">
                        @foreach($vehicle->pictures as $picture)
                            <img class="aspect-video object-cover" src="{{ $picture->path }}">
                        @endforeach
                    </div>
                    <div class="flex space-x-4">
                        <img class="w-24 h-24" src="{{ Storage::url($vehicle->user->avatar_path) }}" alt="">
                        <div class="space-y-2">
                            <h3 class="text-2xl font-semibold">{{ $vehicle->type->name }}
                                de {{ $vehicle->user->first_name }} {{ $vehicle->user->last_name }}</h3>
                            <p class="text-neutral-500">{{ $vehicle->city }}</p>
                            <div>
                                @include('components.rating', ['rating' => $vehicle->ratingAverage()])
                            </div>
                        </div>
                    </div>

                    <!-- Informations générales -->
                    {{--                    <div class="flex flex-col md:flex-row gap-4 mt-8">--}}
                    <div class="icones">
                        <div class="flex flex-col items-center text-center">
                            <i class="fa-light fa-seat-airline text-4xl mb-4"></i>
                            <p><strong>{{ $vehicle->seats }} places</strong> <br> sécurisées</p>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <i class="fa-light fa-bed-front text-4xl mb-4"></i>
                            <p><strong>{{ $vehicle->beds }} places</strong> <br>de couchage</p>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <i class="fa-light fa-paw text-4xl mb-4"></i>
                            <p>Animaux <br><strong>{{ $vehicle->animals ? 'autorisés' : 'non autorisés' }}</strong></p>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <i class="fa-light fa-earth-americas mb-4 text-4xl"></i>
                            <p>Voyage à l'étranger
                                <br><strong>{{ $vehicle->travel_abroad ? 'autorisé' : 'non autorisé' }}</strong></p>
                        </div>
                    </div>

                    <!-- Caractéristiques techniques -->
                    <div class="flex flex-col md:flex-row mt-8 gap-8">
                        <div class="w-12/12 md:w-6/12">
                            <h3 class="font-bold">Caractéristiques techniques</h3>
                        </div>
                        <div class="w-12/12 md:w-6/12">
                            <p>Modèle : <strong>{{ $vehicle->model }}</strong></p>
                            <p>Mise en circulation : <strong>{{ $vehicle->year }}</strong></p>
                            <br>
                            <p>Nombre de places assises : <strong>{{ $vehicle->seats }}</strong></p>
                            <p>Nombre de places de couchage : <strong>{{ $vehicle->beds }}</strong></p>
                            <br>
                            <p>Longueur : <strong>{{ $vehicle->length }} m</strong></p>
                            <p>Largeur : <strong>{{ $vehicle->width }} m</strong></p>
                            <p>Hauteur : <strong>{{ $vehicle->height }} m</strong></p>
                            <br>
                            <p>Eau propre : <strong>{{ $vehicle->clean_water }} l</strong></p>
                            <p>Eaux usagées : <strong>{{ $vehicle->waste_water }} l</strong></p>
                            <br>
                            <p>Nombre de kilomètres : <strong>{{ number_format($vehicle->km, 0, ',', ' ') }} km</strong>
                            </p>
                        </div>
                    </div>


                </div>
                <!-- Left Column End -->

                <!-- Right Column -->
                <div class="w-12/12 md:w-6/12 mt-8 md:mt-0">
                    <div class="border border-neutral-300 rounded-lg bg-white">
                        <h2 class="p-4 text-center text-xl bg-black text-white font-bold rounded-t-lg">
                            Réservation</h2>
                        <form class="p-4" method="post" action="{{ route('booking.index', ['id' => $vehicle->id]) }}">
                            @csrf
                            <div class="flex gap-2 mb-4">
                                <div class="flex-1">
                                    <label class="block">Date de départ</label>
                                    <input
                                        id="booking_startDate"
                                        class="border border-neutral-300 rounded w-full p-2 focus:outline outline-amber-500"
                                        type="text"
                                        name="start_date"
                                    >
                                </div>

                                <div class="flex-1">
                                    <label class="block">Date de retour</label>
                                    <input
                                        id="booking_endDate"
                                        class="border border-neutral-300 rounded w-full p-2 focus:outline outline-amber-500"
                                        type="text"
                                        name="end_date"
                                    >
                                </div>
                            </div>


                            <button type="submit"
                                    class="w-full sm:w-4/12 bg-amber-500 hover:bg-amber-600 p-4 rounded-lg text-black font-semibold">
                                Réserver
                            </button>

                        </form>
                    </div>

                    <!-- Description du véhicule -->
                    <div class="mt-4 border border-neutral-300 rounded-lg p-4 bg-white">
                        <h2 class="text-xl font-bold">
                            Description
                        </h2>
                        <p class="mt-4 text-neutral-700 leading-relaxed">
                            {{ $vehicle->description }}
                        </p>
                    </div>
                    <!-- End Description du véhicule -->

                </div>
                <!-- End Right Column -->
            </section>

            <!-- Avis location -->
            <section class="mt-8 bg-white">
                <div class="container mx-auto p-4">
                    <h3 class="font-bold text-xl">Avis locataires</h3>
                    <!-- Votes -->
                    @include('components.rating', ['rating' => $vehicle->ratingAverage()])
                    | {{ count($vehicle->comments) }}
                    avis
                    <!-- End Votes -->
                    <div class="divide-y divide-slate-300 w-12/12 lg:w-6/12 mx-auto">
                        @foreach($vehicle->comments as $comment)
                            <div class="my-8 flex gap-4 p-6 items-start">
                                <img class="rounded-lg w-16" src="{{ Storage::url($vehicle->user->avatar_path) }}">
                                <div class="w-full">
                                    <h5 class="font-medium">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</h5>
                                    <p class="text-sm text-neutral-500 italic">{{ $comment->created_at->isoFormat('LL') }}</p>
                                    <p class="font-light tracking-wide leading-relaxed">
                                        {{ $comment->content }}
                                    </p>
                                    @if ( count($comment->memories) > 0 )
                                        <div class="memories flex flex-wrap gap-4 mt-4">
                                            @foreach($comment->memories as $memory)
                                                <a href="{{ preg_match('(https)', $memory->path) ? $memory->path : asset('/storage/'.$memory->path) }}" data-lightbox="image"
                                                   data-title="{{ $memory->comment->user->name }} - {{ $memory->created_at->isoFormat('LL') }} - {{ $memory->comment->vehicle->type->name }} {{ $memory->comment->vehicle->model }}">
                                                    <img class="w-24 h-24 rounded-lg" src="{{ preg_match('(https)', $memory->path) ? $memory->path : asset('/storage/'.$memory->path) }}">
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- End Avis location -->


        </div>
    </main>
@endsection

@section('javascripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"
            integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        lightbox.option({
            'albumLabel': "Image %1 sur %2",
            'wrapAround': true
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker.min.js"></script>
    <script>
        const startDate = document.querySelector('#booking_startDate')
        const endDate = document.querySelector('#booking_endDate')
        let endDateMin = startDate.value
        const datepickerStart = new Datepicker(startDate, {
            format: 'dd/mm/yyyy',
            datesDisabled: [
                @if ($vehicle->getNotAvailableDays() !== null)
                    @foreach($vehicle->getNotAvailableDays($vehicle->id) as $day)
                    "{{ $day->format('d/m/Y') }}",
                @endforeach
                @endif
            ],
            minDate: new Date(),

        })


        startDate.addEventListener('changeDate', () => {
            const datepickerEnd = new Datepicker(endDate, {
                format: 'dd/mm/yyyy',
                datesDisabled: [
                    @if ($vehicle->getNotAvailableDays() !== null)
                        @foreach($vehicle->getNotAvailableDays($vehicle->id) as $day)
                        "{{ $day->format('d/m/Y') }}",
                    @endforeach
                    @endif
                ],
                minDate: startDate.value,
            })
        })
    </script>

@endsection

