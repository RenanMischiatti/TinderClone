<x-app-layout>
    @section('js')
        <script src="{{asset('js/home.js')}}"></script>
    @endsection
    @section('css')
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Olá " . Auth::user()->info->nome) }}
        </h2>
    </x-slot>

    
    <div class="demo">

        <div class="demo__content">
            <div class="demo__card-cont">

                @foreach ($users as $user)   

                    <div class="demo__card">
                        <div class="demo__card__top d-flex flex-column">
                            <div class="demo__card__img" style="background-image: url('{{'storage'.asset($user->foto->first()->foto_caminho)}}')">
                                <span class="demo__card__name">
                                    <span class="info d-flex">
                                        <span class="text-truncate nome">
                                            {{$user->info->PrimeirosNomes}}
                                        </span>
                                        <span>
                                            ,{{$user->info->Idade}}
                                        </span>
                                        
                                    </span>
                                    <span class="text-white descricao text-truncate line-clamp-2">{{$user->info->biografia}}sasas as as dasd acfascvascva sda sdasd asdas   </span>
                                </span>
                            </div>
                        </div>
                        <div class="demo__card__btm">
                            <div class="botoesAction">
                                <button class="dislike" type="button" data-user-id="{{$user->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                    </svg>
                                </button>
                                <button class="like" type="button" data-user-id="{{$user->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="demo__card__choice m--reject"></div>
                        <div class="demo__card__choice m--like"></div>
                        <div class="demo__card__drag"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    

</x-app-layout>
