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
            <div class="col-md-3" id="conversas" style="border: 3px solid red">
                    @foreach ($usersMactheds as $user)
                        
                    @endforeach


            </div>
            <div class="col-9 d-md-block d-none" id="areaChat" style="border: 3px solid red">
                
            </div>
        </div>




        
        
        
        
    </main>
</x-app-layout>