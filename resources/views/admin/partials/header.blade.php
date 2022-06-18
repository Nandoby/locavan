<header>
    <!--Nav-->
    <nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                <h1 class="text-3xl uppercase text-amber-500 mr-4 pl-2">
                    <a href="{{ route('home') }}">
                        <span class="text-white border-y-2 border-y-amber-500">Loca</span>van
                    </a>
                </h1>
            </div>

            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">

                    <li class="flex-1 md:flex-none md:mr-3">
                        <div class="relative inline-block">
                            <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="drop-button text-white py-2 px-2"> <span class="pr-2"><i class="fa fa-user"></i></span> Bonjour {{ auth()->user()->first_name }} <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg></button>
                            <div id="dropdown" class="absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 hidden">
                                <a href="/profile" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profil</a>
                                <div class="border border-gray-800"></div>
                                <a href="{{ route('auth.logout') }}" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Déconnexion</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>


    </nav>
</header>
