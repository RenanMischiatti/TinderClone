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
                <div id="areaBusca" class="row align-items-center px-3">
                    <div class="search-input">
                        <input type="text" placeholder="Pesquisar" id="inputBusca">
                        <span class="search-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                          </svg>
                        </span>
                      </div>
                      
                </div>

                <div class="row">
                    <div id="contatos">
                        @foreach ($matchs as $match)
                            <div class="usuario text-gray-800 dark:text-gray-200" data-id="{{$match->id}}" data-rota="{{route('chat.acess')}}">
                                <div class="col-2 d-flex justify-center p-1">
                                    <img src="{{$match->userMatched->foto->first()->fot_caminho}}" alt="" class="img-fluid align-self-center rounded-circle">
                                </div>
                                <div class="col-10 d-flex justify-content-center flex-column pl-3 pb-2">
                                    <div class="w-100 d-flex">
                                        <b class="nome">{{$match->userMatched->info->nome}}</b>
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
                </div>

            </div>
            <div class="col-9 d-lg-flex justify-content-lg-center d-none p-0" id="areaChat">

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