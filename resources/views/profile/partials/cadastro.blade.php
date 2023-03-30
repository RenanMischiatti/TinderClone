<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Seu Perfil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg">
            
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Informações da sua Conta') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Seus primeiros passos para criar a sua conta.") }}
            </p>
            <form action="{{route('profile.cadastro.create')}}" method="post" id="formCadastro">
                @csrf
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Nome completo')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="mb-3">
                    <x-input-label for="idade" :value="__('Data de Nascimento')" />
                    <x-text-input id="idade" name="idade" type="date" class="mt-1 block w-full"/>
                    <x-input-error class="mt-2" :messages="$errors->get('idade')" />

                </div>
                <div class="mb-3">
                    <x-input-label for="estado" :value="__('Região')" />
                    <select name="estado" id="estado" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option disabled selected>--Selecione sua região</option>
                        @foreach ($estados as $estado)
                            <option value="{{$estado->nome}}">{{$estado->nome}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <x-input-label for="estado" :value="__('Biografia')" />
                    <textarea id="biografia" name="biografia" type="text" class="mt-1 block w-full mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"/></textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('biografia')" />
                </div>

                <div class="mb-3">
                    <x-input-label for="estado" :value="__('Foto de Perfil')" />
                    <input id="foto" name="foto" multiple type="file" class="mt-1 block w-100 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />
                    <x-input-error class="mt-2" :messages="$errors->get('foto')" />
                </div>
                <div id="area-foto" class="w-100 my-4" style="display: none;">
                    
                </div> 
                <div class="w-100 d-flex justify-content-end">
                    <button class="btn btn-dark botaoSubmit" style="display:none">Criar conta</button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>

