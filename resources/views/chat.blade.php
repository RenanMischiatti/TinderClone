<x-app-layout>
    @section('js')
        <script src="{{asset('js/home.js')}}"></script>
    @endsection
    @section('css')
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Conversas
        </h2>
    </x-slot>

    

</x-app-layout>