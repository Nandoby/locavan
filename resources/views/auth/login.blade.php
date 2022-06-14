@extends('app')

@section('title')
    LOCAVAN | Login
@endsection

@section('content')

    @if (session('error'))
        <div class="p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif

    @if (session('register'))
        <div class="p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            <span class="font-medium">{{ session('register') }}</span>
        </div>
    @endif

    <section class="h-screen flex">
        <img class="w-6/12 object-cover" src="{{ asset('images/login-background.jpg') }}" alt="">
        <div class="flex justify-center items-center w-6/12">
            <form class="w-6/12 bg-white p-4 shadow-lg" method="post" action="{{ route('login') }}">
                @csrf
                <h1 class="text-3xl uppercase text-amber-600 drop-shadow-lg">
                    <a href="{{ route('home') }}">
                        <span class="text-black border-y-2 border-y-amber-600">Loca</span>van
                    </a>
                </h1>
                <h3 class="my-3 text-gray-800">
                    Connexion à votre compte
                </h3>
                <div class="mb-3">
                    <label for="email" class="block mb-3 text-gray-500 text-sm">
                        E-mail
                    </label>
                    <input id="email" class="border border-gray-300 p-2 w-full text-gray-900 focus:outline-none rounded shadow" type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="block mb-3 text-gray-500 text-sm">
                        Mot de passe
                    </label>
                    <input id="password"
                           class="border border-gray-300 p-2 w-full text-gray-900 focus:outline-none rounded shadow"
                           type="password" name="password">
                </div>
                <button class="bg-amber-600 text-white font-medium p-4 tracking-tight rounded hover:bg-amber-700 transition duration-150" type="submit">
                    Connexion
                </button>
                <p class="text-sm mt-4">
                    Vous n'avez pas encore de compte ?
                    <a href="{{ route('auth.register') }}" class="underline text-yellow-600 hover:text-yellow-800">Inscrivez-vous</a>
                </p>
            </form>

        </div>
    </section>
@endsection
