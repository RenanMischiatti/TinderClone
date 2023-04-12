@section('js')
    <script src="{{asset('js/profile/editar.js')}}"></script>
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Seu Perfil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
           
                <div class="p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg d-sm-flex">
                    <div class="col-sm-6 col-12">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg" style="border: 1px solid red">
                    <div class="col-12 p-0">
                        <div class="w-100 h-100">
                            <div class="row" id="fotos">
                                @include('profile.partials.fotos')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            
        </div>
    </div>
</x-app-layout>
