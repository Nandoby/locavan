@extends('app')


@section('title')
    Locavan | Tous les véhicules
@endsection

@section('content')
    @include('partials.header')

    <section>

        <h1 class="font-bold tracking-wide text-5xl text-gray-900 text-center my-24">
            Tous nos véhicules
        </h1>

        <div
            class="container mx-auto px-4 grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 grid-rows-6 gap-4 justify-center mt-4">
            @forelse($vehicles as $vehicle)
                <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
                    <a href="{{ route('vehicle.show', ['id' => $vehicle->id]) }}">
                        <img class="rounded-t-lg w-full max-h-56 object-cover object-center"
                             src="{{ preg_match('(https)', $vehicle->pictures[0]->path ) ? $vehicle->pictures[0]->path : asset('/storage/'. $vehicle->pictures[0]->path) }}"
                             alt=""/>
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $vehicle->type->name }} {{ $vehicle->model }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">
                            {{ $vehicle->type->name }}
                            de {{ $vehicle->user->first_name }} {{ $vehicle->user->last_name[0] }}.
                        </p>
                        <p class="mb-3 font-normal text-gray-700">
                            Cette annonce a été ajouté {{ $vehicle->created_at->diffForHumans() }}
                        </p>
                        <span class="bg-yellow-100 text-yellow-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">
                        {{ $vehicle->city }}
                    </span>
                    </div>
                </div>
            @empty
                <span class="col-start-1 col-end-5 ">
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 text-center" role="alert">
                       Aucun résultat pour <b>{{ $request }}</b>, veuillez essayer une autre ville
                    </div>
                </span>
            @endforelse
        </div>


    </section>

@endsection
