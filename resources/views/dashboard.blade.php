<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Olá " . Auth::user()->info->nome) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div id="areaLikes" class="row d-flex justify-content-center">
                        @foreach ($users as $user)
                            <div class="col-12 col-md-6">
                                <img src="storage/{{$user->foto->first()->foto_caminho}}" class="w-100 img-fluid" alt="">
                                {{$user->info->nome}}
                            </div>  
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
