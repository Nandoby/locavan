@extends('app')

@section('title')
    Locavan | Ajouter une annonce
@endsection

@section('content')
    @include('partials.header')

    <section class="container mx-auto px-4">
        <h1 class="tracking-wide font-bold text-3xl text-center my-8">
            Création d'une annonce pour votre véhicule
        </h1>
        <form action="{{ route('vehicle.store') }}" method="POST" class="bg-white shadow p-4 mb-8"
              enctype="multipart/form-data">
            @csrf
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="model" class="label">Modèle</label>
                    <input type="text" id="model" name="model"
                           class="input-field @error('model') border-red-500 @enderror" placeholder="Votre modèle" value="{{ old('model') }}">
                    @error('model')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="type" class="label">Type</label>
                    <select id="type" name="type" class="select @error('type') border-red-500 @enderror">
                        @foreach($types as $type)
                            @if($loop->first)
                                <option selected disabled>Choisissez un type</option>
                            @endif
                            <option value="{{ $type->id }}">
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('type')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="price" class="label">Prix</label>
                    <input type="number" step="0.10" id="price" name="price"
                           class="input-field @error('price') border-red-500 @enderror"
                           placeholder="Prix de la location par jour (en Euros)"
                           value="{{ old('price') }}" >
                    @error('price')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="year" class="label">Année</label>
                    <input type="number" step="1" name="year" id="year"
                           class="input-field @error('year') border-red-500 @enderror"
                           placeholder="Année de fabrication"
                           value="{{ old('year') }}" >
                    @error('year')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="length" class="label">Longueur</label>
                    <input type="text" name="length" id="length"
                           class="input-field @error('length') border-red-500 @enderror"
                           placeholder="Longueur du véhicule en mètres"
                           value="{{ old('length') }}">
                    @error('length')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="height" class="label">Hauteur</label>
                    <input type="text" name="height" id="height"
                           class="input-field @error('height') border-red-500 @enderror"
                           placeholder="Hauteur du véhicule en mètres"
                           value="{{ old('height') }}">
                    @error('height')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="width" class="label">Largeur</label>
                    <input type="text" name="width" id="width"
                           class="input-field @error('width') border-red-500 @enderror"
                           placeholder="Largeur du véhicule en mètres"
                           value="{{ old('width') }}">

                    @error('width')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="km" class="label">Km</label>
                    <input id="km" type="text" name="km" class="input-field @error('km') border-red-500 @enderror"
                           placeholder="Nombre de kilomètres" value="{{ old('km') }}">
                    @error('km')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="city" class="label">Ville</label>
                    <input type="text" id="city" name="city" class="input-field @error('city') border-red-500 @enderror"
                           placeholder="Localisation du véhicule" value="{{ old('city') }}">
                    @error('city')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="clean_water" class="label ">Eaux claires</label>
                    <input type="number" step="0.10" id="clean_water" name="clean_water"
                           class="input-field @error('clean_water') border-red-500 @enderror"
                           placeholder="Nombre de litres d'eaux claires" value="{{ old('clean_water') }}">
                    @error('clean_water')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="waste_water" class="label ">Eaux usées</label>
                    <input type="number" step="0.10" id="waste_water" name="waste_water"
                           class="input-field @error('waste_water') border-red-500 @enderror"
                           placeholder="Nombre de litres d'eaux usées" value="{{ old('waste_water') }}">
                    @error('waste_water')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="seats" class="label">Sièges</label>
                    <input type="text" name="seats" id="seats"
                           class="input-field @error('seats') border-red-500 @enderror"
                           placeholder="Nombre de places assises" value="{{ old('seats') }}">
                    @error('seats')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="beds" class="label">Couchages</label>
                    <input type="text" name="beds" id="beds" class="input-field @error('beds') border-red-500 @enderror"
                           placeholder="Nombre de places de couchage" value="{{ old('beds') }}">
                    @error('beds')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="animals" class="label">Animaux autorisés</label>
                    <select id="animals" name="animals" class="select @error('animals') border-red-500 @enderror">
                        <option selected disabled>Choisissez Oui ou Non</option>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                    @error('animals')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="travel_abroad" class="label">Voyages à l'étranger</label>
                    <select id="travel_abroad" name="travel_abroad"
                            class="select @error('travel_abroad') border-red-500 @enderror">
                        <option selected disabled>Choisissez Oui ou Non</option>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                    @error('travel_abroad')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="description" class="label">Description</label>
                    <textarea id="description" rows="4" name="description"
                              class="textarea @error('description') border-red-500 @enderror"
                              placeholder="Description du véhicule..." value="{{ old('description') }}"></textarea>
                    @error('description')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="pictures" class="label">Photos</label>
                    <input type="file" name="pictures[]" id="pictures"
                           class="input-file {{ session('extension') ? 'border-red-500' : null }}" multiple>
                    @error('pictures')
                    <span class="text-sm text-red-600 font-normal">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <button type="submit"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                Créer une annonce
            </button>
        </form>
    </section>
@endsection
