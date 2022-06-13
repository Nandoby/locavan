@extends('app')

@section('title')
    LOCAVAN | S'enregistrer
@endsection

@section('content')

    <section class="h-screen flex">
        <img class="w-6/12 object-cover" src="{{ asset('images/register-background.jpg') }}" alt="">
        <div class="flex justify-center items-center w-6/12">
            <form class="w-6/12 bg-white p-4 shadow-lg" method="post" action="{{ route('auth.register.post') }}" enctype="multipart/form-data">
                @csrf
                <h1 class="text-3xl uppercase text-amber-600 drop-shadow-lg">
                    <a href="{{ route('home') }}">
                        <span class="text-black border-y-2 border-y-amber-600">Loca</span>van
                    </a>
                </h1>
                <h3 class="my-3 text-gray-800">
                    Inscription
                </h3>
                <div class="mb-3">
                    <label for="first_name" class="block mb-3 text-gray-500 text-sm">
                        Prénom
                    </label>
                    <input type="text" id="first_name" name="first_name"
                           class="@error('first_name') border border-red-500 @enderror border border-gray-300 p-2 w-full text-gray-900 focus:outline-none rounded shadow"
                           value="{{ old('first_name') }}">
                    @error('first_name')
                    <span class="text-sm text-red-500">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="last_name" class="block mb-3 text-gray-500 text-sm">
                        Nom
                    </label>
                    <input type="text" id="last_name" name="last_name"
                           class="@error('last_name') border border-red-500 @enderror border border-gray-300 p-2 w-full text-gray-900 focus:outline-none rounded shadow"
                           value="{{ old('last_name') }}">
                    @error('last_name')
                    <span class="text-sm text-red-500">* {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="block mb-3 text-gray-500 text-sm">
                        E-mail
                    </label>
                    <input id="email"
                           class="@error('email') border border-red-500 @enderror border border-gray-300 p-2 w-full text-gray-900 focus:outline-none rounded shadow"
                           type="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="text-sm text-red-500">* {{ $message }} </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="block mb-3 text-gray-500 text-sm">
                        Mot de passe
                    </label>
                    <input id="password"
                           class="@error('password')border border-red-500 @enderror border border-gray-300 p-2 w-full text-gray-900 focus:outline-none rounded shadow"
                           type="password" name="password">
                    @error('password')
                    <span class="text-sm text-red-500">* {{ $message }} </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="block mb-3 text-gray-500 text-sm" for="avatar">Avatar</label>
                    <input class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none" id="avatar" type="file" name="avatar_path">
                    @error('avatar_path')
                    <span class="block text-sm text-red-500">* {{ $message }} </span>
                    @enderror
                    <span class="text-sm text-gray-500">** Si aucun avatar n'est uploadé, un avatar par défaut sera attribué **</span>
                </div>

                <button
                    class="bg-amber-600 text-white font-medium p-4 tracking-tight rounded hover:bg-amber-700 transition duration-150"
                    type="submit">
                    S'enregistrer
                </button>
            </form>

        </div>
    </section>
@endsection

