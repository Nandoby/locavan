@extends('app')

@section('title')
    Conditions générales
@endsection

@section('content')
    @include('partials.header')
    <div class="container mx-auto p-6">
        <h1 class="text-center text-4xl font-medium text-gray-900 my-20">Politique de confidentialité</h1>
        <p class="leading-relaxed lg:w-6/12 text-center mx-auto mb-20">
            Nous vous remercions pour l'intérêt porté à notre site. La protection de votre vie privée est très
            importante
            pour nous. Ci-dessous, nous vous donnons des informations détaillées sur le traitement de vos données.
        </p>
        <div class="lg:mx-auto lg:w-8/12 w-full">
            <h3 class="text-xl font-medium text-gray-900 mb-2">
                1. La collecte et l'utilisation des données au moment de la création d'un profil
            </h3>
            <p class="mb-4 font-light leading-relaxed">
                Nous recueillons vos informations personnelles lorsque vous les fournissez au moment d'une réservation
                ou
                lors de la création d'un profil.
                Dans les formulaires respectifs, les informations collectées sont visibles pour tous. Nous utilisons vos
                informations pour le traitement de vos réservations. Après la
                suppression de votre compte, vos données ne seront plus accessibles et seront supprimées après la
                période de
                stockage obligatoire, sauf si vous avez expressément consenti à l'utilisation ultérieure de celles-ci.
            </p>
            <h3 class="text-xl font-medium text-gray-900 mb-2">
                2. La collecte et l'utilisation des données au moment de la publication d'annonce
            </h3>
            <p class="mb-4 font-light leading-relaxed">
                Pour publier une annonce, des informations concernant votre véhicule et vous-même vous sont demandées.
                Certaines informations sont visibles sur le site pour aider le locataire dans le choix de son
                camping-car ou
                van aménagé.
            </p>
            <h3 class="text-xl font-medium text-gray-900 mb-2">
                3. Utilisation des cookies
            </h3>
            <p class="mb-4 font-light leading-relaxed">
                Pour rendre la visite de notre site web attrayante et afin de permettre l'utilisation de certaines
                fonctions, nous utilisons des cookies. Ce sont de petits fichiers de texte qui sont stockés sur votre
                ordinateur ou smartphone. Certains cookies que nous utilisons seront supprimés après votre session de
                navigation lorsque vous fermez votre navigateur (il s'agit des "cookies de session"). D'autres cookies
                restent sur votre appareil et nous permettent de reconnaître votre navigateur lorsque vous visitez à
                nouveau notre site. Vous pouvez configurer votre navigateur afin d'en être informé à chaque utilisation
                de cookies. Vous pouvez également décider individuellement de les accepter ou non. Si vous refusez
                l'utilisation des cookies, certaines fonctionnalités de notre site peuvent être limitées.
            </p>
        </div>

    </div>
@endsection
