@extends('app')

@section('title')
    Locavan | Modification de {{ $user->first_name }}
@endsection

@section('content')
    @include('partials.header')
    <div class="container mx-auto">

        @if (session('password'))
            <div class="p-4 my-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                <span class="font-medium">{{ session('password') }}</span>
            </div>
        @endif

        @if (session('success'))
            <div class="p-4 my-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <h1 class="text-xl mt-4 font-bold ">Modification de votre profil</h1>

        <form action="/profile" method="POST" class="bg-white p-4 shadow mt-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Prénom</label>
                <input type="text" id="first_name"
                       class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       value="{{ $user->first_name }}" disabled>
            </div>
            <div class="mb-3">
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nom</label>
                <input type="text" id="last_name"
                       class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       value="{{ $user->last_name }}" disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" id="email" name="email"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5"
                       value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900"><span
                        class="text-bold text-red-500">*</span> Nouveau mot de passe</label>
                <input type="password" id="password" name="password"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5"
                ">
            </div>
            <div class="mb-3">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900"><span
                        class="text-bold text-red-500">*</span> Confirmation de mot de passe</label>
                <input type="password" id="password" name="password-confirm"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5"
                ">
            </div>


            <div class="mb-3">
                <p class="text-sm font-bold mb-2"><span class="text-red-500 font-bold">*</span> Avatar</p>
                <img class="w-24 h-24" src="{{ asset('/storage/'.$user->avatar_path) }}">
                <input type="file" name="avatar"
                       class="mt-2 rounded bg-gray-50 text-gray-900 w-full text-sm border border-gray-300">
                @error('avatar')
                <div class="text-sm text-red-500 font-medium mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <p class="text-sm my-4">
                <span class="text-red-500 font-light italic">* Laissez les champs vides si vous ne souhaitez pas modifier votre mot de passe</span>
            </p>


            <button type="submit"
                    class="focus:outline-none text-white bg-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                Modifier
            </button>
            <a href="{{ session()->previousUrl() }}"
               class="focus:outline-none text-black bg-gray-300 px-5 py-3 rounded-lg text-sm font-medium hover:bg-gray-500 focus:ring-4 focus:ring-gray-300">Retour</a>
        </form>

    </div>
@endsection
