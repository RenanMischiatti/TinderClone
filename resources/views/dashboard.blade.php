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
                                            {{$user->info->PrimeirosNomes}}1
                                        </span>
                                        <span>
                                            ,{{$user->info->Idade}}
                                        </span>
                                        
                                    </span>
                                    <span class="text-white descricao">Gosto de </span>
                                </span>
                            </div>
                        </div>
                        <div class="demo__card__btm">
                            <div class="botoesAction">
                                <button class="dislike">X</button>
                                <button class="like">s</button>
                            </div>
                        </div>
                        <div class="demo__card__choice m--reject"></div>
                        <div class="demo__card__choice m--like"></div>
                        <div class="demo__card__drag"></div>
                    </div>
                    <div class="demo__card">
                        <div class="demo__card__top d-flex flex-column">
                            <div class="demo__card__img" style="background-image: url('{{'storage'.asset($user->foto->first()->foto_caminho)}}')">
                                <span class="demo__card__name">
                                    <span class="info d-flex">
                                        <span class="text-truncate nome">
                                            {{$user->info->PrimeirosNomes}}2
                                        </span>
                                        <span>
                                            ,{{$user->info->Idade}}
                                        </span>
                                        
                                    </span>
                                    <span class="text-white descricao">Gosto de </span>
                                </span>
                            </div>
                        </div>
                        <div class="demo__card__btm">
                            <div class="botoesAction">
                                <button class="dislike">X</button>
                                <button class="like">s</button>
                            </div>
                        </div>
                        <div class="demo__card__choice m--reject"></div>
                        <div class="demo__card__choice m--like"></div>
                        <div class="demo__card__drag"></div>
                    </div>
                    <div class="demo__card">
                        <div class="demo__card__top d-flex flex-column">
                            <div class="demo__card__img" style="background-image: url('{{'storage'.asset($user->foto->first()->foto_caminho)}}')">
                                <span class="demo__card__name">
                                    <span class="info d-flex">
                                        <span class="text-truncate nome">
                                            {{$user->info->PrimeirosNomes}}3
                                        </span>
                                        <span>
                                            ,{{$user->info->Idade}}
                                        </span>
                                        
                                    </span>
                                    <span class="text-white descricao">Gosto de </span>
                                </span>
                            </div>
                        </div>
                        <div class="demo__card__btm">
                            <div class="botoesAction">
                                <button class="dislike">X</button>
                                <button class="like">s</button>
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
