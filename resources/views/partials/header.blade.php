@php
    $currentUser = auth()->user();
@endphp

<header class="p-4 flex flex-wrap justify-center md:justify-between shadow items-center md:flex-wrap bg-white space-y-2">
    <div class="flex">
        <h1 class=" text-xl md:text-3xl uppercase text-amber-600 mr-4">
            <a href="{{ route('home') }}">
                <span class="text-black border-y-2 border-y-amber-600">Loca</span>van
            </a>
        </h1>
    </div>
    <form action="{{ route('vehicles.search') }}" class="">
        <div class="relative">
            <input
                class="p-2 border border-neutral-400 rounded pl-8 placeholder:text-sm focus:outline outline-amber-500 w-full"
                type="search" placeholder="Ex: Mons" name="city" value="{{ isset($request) ? $request : ''  }}">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5 absolute top-[50%] translate-y-[-50%] ml-2 stroke-neutral-400" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
    </form>

    <nav id="navigation" class="md:my-8">
        <ul class="flex items-center space-x-4">
            <li class="hidden md:block">
                <a class="tracking-wide linkanimate" href="{{ route('home') }}">Accueil</a>
            </li>
            @guest()
            <li class="hidden md:block">
                <a class="tracking-wide linkanimate" href="{{ route('auth.login') }}">Connexion | Inscription</a>
            </li>
            @endguest

            @auth()
                <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-amber-600 hover:text-amber-900 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">{{ Auth::getUser()->first_name }} {{ Auth::getUser()->last_name }}<img class="w-10 h-10 rounded-full ml-3" src="{{ asset('storage/'.Auth::getUser()->avatar_path) }}" alt=""><svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

                        <li>
                            <a href="/profile"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex justify-center gap-4 items-center"><i class="fa-solid fa-user"></i>Modifier
                                profil</a>
                        </li>
                        <li>
                            <a href="{{ route('my-bookings') }}"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex justify-center gap-4 items-center"><i class="fa-solid fa-rv"></i>Mes réservations</a>
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
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex justify-center gap-4 items-center"><i class="fa-solid fa-arrow-right-from-bracket"></i>Déconnexion</a>
                        </li>
                    </ul>
                </div>

            @endauth
            <li class="hidden md:block">
                <a class="tracking-wide ring-1 ring-amber-500 text-amber-600 rounded-sm transition-all duration-300 hover:bg-amber-600 hover:text-white p-4"
                   href="{{ route('vehicle.create') }}">Déposer une annonce</a>
            </li>
            <li id="burger" class="md:hidden cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 stroke-amber-500" fill="none"
                     viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </li>
        </ul>
        <ul id="mobile"
            class="fixed z-10 w-full h-screen bg-blend-overlay bg-black/75 bg-[url('https://images.unsplash.com/photo-1578047960766-2cc2da98009b?ixlib=rb-1.2.1&raw_url=true&q=80&fm=jpg&crop=entropy&cs=tinysrgb&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470')] bg-cover bg-center transition-left duration-300 ease-in-out -top-6 -left-[100%] md:hidden p-4">
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
            <li>
                <a class="text-amber-500 text-lg block text-center p-2 transition-bg duration-300 cubic active:bg-amber-50"
                   href="">Connexion</a>
            </li>
            <li>
                <a class="text-amber-500 text-lg block text-center p-2 transition-bg duration-300 cubic active:bg-amber-50"
                   href="">Déposer une annonce</a>
            </li>
        </ul>
    </nav>
</header>
