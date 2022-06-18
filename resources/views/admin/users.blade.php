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

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 mt-28 mb-28">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3">Avatar</th>
                            <th scope="col" class="px-6 py-3">Prénom</th>
                            <th scope="col" class="px-6 py-3">Nom</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Admin</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">
                                    {{ $user->id }}
                                </td>
                                <td>
                                    <img class="w-10 h-10 rounded-full" src="{{ Storage::url($user->avatar_path) }}">
                                </td>
                                <td>
                                    {{ $user->first_name }}
                                </td>
                                <td>
                                    {{ $user->last_name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td class="text-left">
                                    {!!   $user->is_admin ? '<span class="bg-green-100 text-green-800 px-2.5 py-0.5 rounded">Oui</span>' : '<span class="bg-gray-100 text-gray-800 px-2.5 py-0.5 rounded">Non</span>'!!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </section>
        </div>

    </main>

@endsection
