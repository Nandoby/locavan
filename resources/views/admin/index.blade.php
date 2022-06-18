@extends('admin.layout.app')

@section('title')
    Locavan | Administration | Accueil
@endsection

@section('content')
    @parent
    <main>

        <div class="flex flex-col md:flex-row">
            @include('admin.partials.nav')
            <section class="w-full">
                <div class="grid justify-center md:grid-cols-3 mt-40 gap-8 md:p-8">

                    <div class="p-6 max-w-sm bg-white rounded-lg shadow-md border-b-4 border-pink-500">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-pink-600 text-center">
                            Utilisateurs
                        </h5>
                        <p class="text-2xl flex justify-center font-bold text-pink-900">
                            {{ count($users) }}
                        </p>
                    </div>

                    <div class="p-6 max-w-sm bg-white rounded-lg shadow-md border-b-4 border-indigo-500 text-center">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-indigo-600">
                            Annonces
                        </h5>
                        <p class="text-2xl flex justify-center text-indigo-900 font-bold">
                            {{ count($vehicles) }}
                        </p>
                    </div>

                    <div class="p-6 max-w-sm bg-white rounded-lg shadow-md border-b-4 border-blue-500 text-center">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-blue-600">
                            Commentaires
                        </h5>
                        <p class="text-2xl flex justify-center font-bold text-blue-900">
                            {{ count($comments) }}
                        </p>
                    </div>

                </div>
            </section>
        </div>

    </main>

@endsection
