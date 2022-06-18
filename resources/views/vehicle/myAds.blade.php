@extends('app')

@section('title')
    Locavan | Mes annonces
@endsection

@section('content')
    @include('partials.header')
    <section>
        <div class="container mx-auto px-4">
            <h1 class="font-medium text-3xl my-4">Mes annonces</h1>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Modèle
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Km
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date de création
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Prix
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Réservations
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Commentaires
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vehicles as $vehicle)
                        <tr class="border-b odd:bg-white even:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $vehicle->model }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $vehicle->type->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $vehicle->km }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $vehicle->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($vehicle->price, 2, ',', ' ') }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-purple-100 text-purple-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">{{ count($vehicle->bookings) }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">{{ count($vehicle->comments) }}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
