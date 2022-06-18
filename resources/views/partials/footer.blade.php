<footer class="p-4 bg-gray-900 shadow  md:p-6">
    <div class="md:flex md:items-center md:justify-between">
        <span class="block text-sm text-gray-300 text-center">Copyright &copy; 2022 <a href="{{ route('home') }}"
                                                                                       class="hover:underline">Locavan</a>. All Rights Reserved</span>
        <h1 class="text-3xl uppercase text-amber-400 text-center m-8">
            <a href="{{ route('home') }}">
                <span class="text-white border-y-2 border-y-amber-400">Loca</span>van
            </a>
        </h1>
        <ul class="flex flex-wrap items-center justify-center mt-3 text-sm text-gray-300 sm:mt-0">
            <li>
                <a href="{{ route('cgu') }}" class="mr-4 hover:underline md:mr-6">Conditions Générales d'Utilisation</a>
            </li>
            <li>
                <a href="{{ route('privacy') }}" class="mr-4 hover:underline md:mr-6">Confidentialité</a>
            </li>
        </ul>
    </div>
    <hr class="border border-gray-800 my-6">
    <span class="block text-right text-sm text-gray-600">Created by Nando</span>
</footer>
