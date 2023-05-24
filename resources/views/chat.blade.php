<x-app-layout>
    @section('js')
        <script src="{{asset('js/chat.js')}}"></script>
    @endsection
    @section('css')
        <link rel="stylesheet" href="{{asset('css/chat.css')}}">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Conversas
        </h2>
    </x-slot>

    
    <main id="chatMain">
        <div class="row m-0 h-100 d-flex">
            <div class="col-lg-3" id="conversas">
                @foreach ($matchs as $match)
                    <div class="usuario text-gray-800 dark:text-gray-200" data-id="{{$match->id}}" data-rota="{{route('chat.acess')}}">
                        <div class="col-2 d-flex justify-center p-1">
                            <img src="{{$match->userMatched->foto->first()->fot_caminho}}" alt="" class="img-fluid align-self-center rounded-circle">
                        </div>
                        <div class="col-10 d-flex justify-content-center flex-column pl-3 pb-2">
                            <div class="w-100 d-flex">
                                <b>{{$match->userMatched->info->nome}}</b>
                                <span class="ms-auto horario dark:text-gray">20:00</span>
                            </div>
                            <p class="ultimaMensagem d-flex">
                                <span class="text-truncate">
                                    Parabéns! Vocês deram match!! 
                                </span>
                                <span class="ms-auto badge rounded-pill text-bg-danger">1+</span>
                            </p>
                            
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-9 d-lg-flex justify-content-lg-center d-none" id="areaChat">

                <div class="w-25 align-self-center opacity-25">
                    <img src="{{asset('img/logo_inicio.png')}}" class="w-100 img-fluid" alt="">
                    <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        Bem-vindo à area de conversas do Tinder Clone!
                    </h2>
                </div>

            </div>
        </div>




        
        
        
        
    </main>
</x-app-layout>