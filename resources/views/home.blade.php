@php
    $currentUser = auth()->user();
@endphp

@extends('app')

@section('title')
    Locavan | Home
@endsection()

@section('content')
    <header class="header relative">
        <nav class="mt-8">
            <ul class="container mx-auto flex space-x-4 justify-end items-center text-white p-4">
                <li class="hidden sm:block">
                    <a class="tracking-wide linkanimate" href="{{route('home')}}">Accueil</a>
                </li>
                @if(!Auth::check())
                    <li class="hidden sm:block">
                        <a class="tracking-wide linkanimate" href="{{ route('auth.login') }}">Connexion |
                            Inscription</a>
                    </li>
                @else
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                            class="text-white  hover:bg-neutral-500 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">{{ Auth::getUser()->first_name }} {{ Auth::getUser()->last_name }}
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"></path>
                        </svg>
                        <img class="w-10 h-10 rounded-full ml-4"
                             src="{{ Storage::url(Auth::getUser()->avatar_path) }}"
                             alt="">
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                         class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

                            <li>
                                <a href="/profile"
                                   class="block px-4 py-2 hover:bg-gray-100 flex justify-center gap-4 items-center"><i
                                        class="fa-solid fa-user"></i>Modifier
                                    profil</a>
                            </li>
                            <li>
                                <a href="{{ route('my-bookings') }}"
                                   class="block px-4 py-2 hover:bg-gray-100 flex justify-center gap-4 items-center"><i
                                        class="fa-solid fa-rv"></i>Mes réservations</a>
                            </li>
                            @if(count($currentUser->vehicles) > 0)
                                <li>
                                    <a href="{{ route('my-ads') }}"
                                       class="block px-4 py-2 hover:bg-gray-100 flex justify-center gap-4 items-center">
                                        <i class="fa-regular fa-book-open"></i>
                                        Mes annonces
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('auth.logout') }}"
                                   class="block px-4 py-2 hover:bg-gray-100 flex justify-center gap-4 items-center"><i
                                        class="fa-solid fa-arrow-right-from-bracket"></i>Déconnexion</a>
                            </li>


                        </ul>
                    </div>
                @endif
                <li class="hidden sm:block">
                    <a class="tracking-wide ring-1 ring-amber-500 text-amber-500 rounded-sm transition-all duration-300 hover:bg-amber-500 hover:text-white p-4"
                       href="{{ route('vehicle.create') }}">Déposer votre annonce</a>
                </li>
                <li id="burger" class="sm:hidden cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 stroke-amber-500" fill="none"
                         viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </li>
            </ul>
            <ul id="mobile"
                class="fixed w-full h-screen bg-blend-overlay bg-black/75 bg-[url('https://images.unsplash.com/photo-1578047960766-2cc2da98009b?ixlib=rb-1.2.1&raw_url=true&q=80&fm=jpg&crop=entropy&cs=tinysrgb&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470')] bg-cover bg-center transition-left duration-300 ease-in-out top-0 -left-[100%] sm:hidden container mx-auto p-4">
                <li>
                    <svg id="close" xmlns="http://www.w3.org/2000/svg"
                         class="h-8 w-8 stroke-amber-500 cursor-pointer ml-auto mt-8" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </li>
                <li>
                    <a class="text-amber-500 text-lg block text-center p-2 transition-bg duration-300 cubic active:bg-amber-50"
                       href="">Accueil</a>
                </li>
                @guest()
                    <li>
                        <a class="text-amber-500 text-lg block text-center p-2 transition-bg duration-300 cubic active:bg-amber-50"
                           href="">Connexion</a>
                    </li>
                @endguest
                <li>
                    <a class="text-amber-500 text-lg block text-center p-2 transition-bg duration-300 cubic active:bg-amber-50"
                       href="">Déposer une annonce</a>
                </li>
            </ul>
        </nav>

        <div class="flex flex-col items-center">
            <h1 class="text-4xl text-white text-center mt-16">Voyagez en camping-car</h1>
            <h3 class="text-2xl text-white text-center mt-8">Explorez de nouveaux horizons</h3>

            <div id="locavan" class="min-w-[200px] max-w-[800px] min-h-[100px] max-h-[400px] mt-16">
                <svg
                    xmlns:svg="http://www.w3.org/2000/svg"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 63.905641 10.8"
                    class="stroke-amber-500 p-4"
                >

                    <g
                        transform="translate(-53.523377,-35.723976)"
                        id="layer1">
                        <g
                            id="text4703"
                            aria-label="LOCAVAN">
                            <path
                                d="m 54.974232,44.82741 h 5.299898 v 1.203711 H 53.656266 V 36.000165 h 1.317966 z"
                                pathLength="1"
                            />
                            <path
                                pathLength="1"
                                d="m 65.973618,46.174423 q -1.682509,0 -2.607888,-1.275369 -0.92538,-1.275357 -0.92538,-3.596805 0,-2.608055 0.995486,-4.026727 1.009503,-1.418659 2.846242,-1.418659 1.668487,0 2.579846,1.275369 0.92538,1.261028 0.92538,3.582477 0,2.608054 -0.995484,4.041055 -0.995483,1.418659 -2.818202,1.418659 z m -1.640445,-2.13516 q 0.532794,0.888462 1.780654,0.888462 1.247862,0 1.780656,-0.90279 0.532794,-0.902791 0.532794,-3.037949 0,-2.106502 -0.532794,-2.994963 -0.518774,-0.90279 -1.766635,-0.90279 -1.261881,0 -1.794675,0.90279 -0.532793,0.90279 -0.532793,3.037949 0,2.120831 0.532793,3.009291 z"/>
                            <path
                                pathLength="1"
                                d="m 77.912409,40.127182 q 0,-1.576291 -0.546814,-2.30712 -0.546816,-0.730829 -1.66849,-0.730829 -1.247859,0 -1.794674,0.931447 -0.546815,0.917119 -0.546815,3.009292 0,2.092172 0.546815,2.994963 0.546815,0.90279 1.808697,0.90279 1.472194,0 2.97243,-0.974448 v 1.390014 q -1.556318,0.831132 -3.12666,0.831132 -1.69653,0 -2.635932,-1.275369 -0.925377,-1.275357 -0.925377,-3.596805 0,-2.608055 0.995484,-4.026727 1.009504,-1.418659 2.846242,-1.418659 1.598383,0 2.509742,1.132067 0.925381,1.117737 0.925381,3.138252 z"/>
                            <path
                                pathLength="1"
                                d="m 87.481669,46.031121 c -0.149556,-0.812027 -0.29444,-1.542857 -0.434649,-2.192475 h -3.855748 c -0.14021,0.58275 -0.289767,1.31358 -0.448668,2.192475 h -1.374049 c 0.644962,-3.544266 1.626423,-6.887927 2.94439,-10.030956 h 1.612402 c 1.299271,3.104819 2.276062,6.448479 2.93037,10.030956 z M 83.45767,42.634935 h 3.308933 c -0.204352,-0.863277 -0.43959,-1.747972 -0.705715,-2.654073 -0.281654,-0.958985 -0.597905,-1.941976 -0.948752,-2.948946 -0.682351,1.958423 -1.233839,3.826095 -1.654466,5.603019 z"/>
                            <path
                                pathLength="1"
                                d="m 96.98082,36.000165 h 1.374049 q -0.967443,5.259084 -2.93037,10.030956 H 93.812095 Q 91.863189,41.388223 90.867706,36.000165 h 1.374049 q 0.883317,4.714544 2.369532,8.984876 1.528279,-4.399292 2.369533,-8.984876 z"/>
                            <path
                                pathLength="1"
                                d="m 106.47999,46.031121 q -0.22434,-1.218041 -0.43465,-2.192475 h -3.85574 q -0.21032,0.874118 -0.44869,2.192475 h -1.37403 q 0.96743,-5.316412 2.94438,-10.030956 h 1.6124 q 1.94889,4.657228 2.93035,10.030956 z m -4.024,-3.396186 h 3.30891 q -0.63092,-2.665379 -1.65445,-5.603019 -1.02355,2.93764 -1.65446,5.603019 z"/>
                            <path
                                pathLength="1"
                                d="m 115.57253,36.000165 h 1.31796 v 10.030956 h -1.45817 l -3.78564,-7.422914 v 7.422914 h -1.31796 V 36.000165 h 1.45815 l 3.78566,7.394252 z"/>
                        </g>
                    </g>
                </svg>
            </div>
        </div>

        <div class="w-full flex justify-center mt-4 md:mt-16">
            <a href="{{ route('vehicle.vehicles') }}"
               class="text-white bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 shadow-lg shadow-yellow-500/50 font-medium rounded-lg text-md px-5 py-2.5 text-center">Réservez
                dès maintenant</a>
        </div>

    </header>
    <main>

        <!-- Latest ADS -->
        <section class="bg-neutral-100 pb-8">
            <div class=" container mx-auto p-1">

                <h2 class="text-center font-bold text-3xl p-2 tracking-wide my-8 underline underline-offset-8 decoration-amber-500">
                    Dernières annonces</h2>
                <div class="flex flex-wrap justify-center">
                    @foreach($vehicles as $vehicle)
                        <div class="md:w-4/12 sm:w-6/12 px-4 my-4">
                            <div class="border border-neutral-300 bg-white rounded-lg">
                                <img
                                    src="{{ preg_match('(https)',$vehicle->pictures[0]->path) ? $vehicle->pictures[0]->path : Storage::url($vehicle->pictures[0]->path) }}"
                                    class="block object-cover w-full rounded-t-lg aspect-video"/>

                                <div class="flex p-4 justify-between">
                                    <div class="space-y-2">
                                        <h1 class="font-bold text-xl">{{ $vehicle->type['name'] }}</h1>
                                        <p class="text-sm text-neutral-700">
                                            {{ $vehicle->city }}
                                        </p>
                                        <p class="text-sm text-neutral-700">
                                            {{ $vehicle->seats }} places - {{ $vehicle->beds }} couchages
                                        </p>
                                    </div>

                                    <div class="text-right text-sm text-neutral-700 space-y-2">
                                        <p>A partir de
                                            <b>{{ (int)$vehicle->price }} &euro;</b></p>
                                        <p>Ajouté {{ $vehicle->created_at->diffForHumans() }}</p>
                                        <p>Par <b>{{ $vehicle->user->first_name }} {{ $vehicle->user->last_name }}</b>
                                        </p>
                                    </div>

                                </div>
                                <a href="{{ route('vehicle.show', ['id' => $vehicle->id]) }}"
                                   class="group m-4 inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600">
                                    Voir plus
                                    <svg class="group-hover:ml-6 transition-all duration-500 ml-2 -mr-1 w-4 h-4"
                                         fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
        <!-- Latest ADS End -->

        <section class="min-h-screen">
            <h2 class="text-3xl font-bold text-center my-8 tracking-wide underline underline-offset-8 decoration-amber-500">
                Ce que nos clients pensent de nous</h2>
        </section>
    </main>

@endsection
