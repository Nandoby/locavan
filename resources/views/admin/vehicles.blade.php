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
                            <th scope="col" class="px-6 py-3">Annonceur</th>
                            <th scope="col" class="px-6 py-3">Modèle</th>
                            <th scope="col" class="px-6 py-3">Prix</th>
                            <th scope="col" class="px-6 py-3">Année</th>
                            <th scope="col" class="px-6 py-3">Lon | Lar | Hau</th>
                            <th scope="col" class="px-6 py-3">Km</th>
                            <th scope="col" class="px-6 py-3">E.C. | E.U.</th>
                            <th scope="col" class="px-6 py-3">Etranger</th>
                            <th scope="col" class="px-6 py-3">Animaux</th>
                            <th scope="col" class="px-6 py-3">Lits</th>
                            <th scope="col" class="px-6 py-3">Sièges</th>
                            <th scope="col" class="px-6 py-3">Ville</th>
                            <th scope="col" class="px-6 py-3">Commentaires</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vehicles as $vehicle)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">
                                    {{ $vehicle->id }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vehicle->user->first_name }} {{ $vehicle->user->last_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vehicle->model }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vehicle->price }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vehicle->year }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vehicle->length }} | {{ $vehicle->width }} | {{ $vehicle->height }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vehicle->km }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vehicle->clean_water }} | {{ $vehicle->waste_water }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vehicle->travel_abroad ? 'Oui' : 'Non' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vehicle->animals ? 'Oui' : 'Non' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vehicle->beds }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vehicle->seats }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $vehicle->city }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-black px-2.5 py-0.5 text-white rounded font-bold">{{ count($vehicle->comments) }}</span>
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
