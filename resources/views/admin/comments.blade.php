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
                            <th scope="col" class="px-6 py-3">Auteur</th>
                            <th scope="col" class="px-6 py-3">Commentaire</th>
                            <th scope="col" class="px-6 py-3">Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">
                                    {{ $comment->id }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $comment->user->first_name }} {{ $comment->user->last_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $comment->content }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $comment->rating }}
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
