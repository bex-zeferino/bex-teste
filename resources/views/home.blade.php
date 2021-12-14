@extends('layouts.app')

@section('content')
    <div x-data="{ open: false }" class=" flex justify-center mt-4 ">
        <button @click="open = ! open"
                class="text-2xl font-medium rounded-full bg-indigo-600 hover:bg-indigo-500 focus:border-gray-800 text-white p-2.5">
            <x-icon name="clipboard-check" class="w-5 h-5"/>
        </button>
        <br>
        <div x-show="open" class="ml-2">
            <x-card>
                Esse é um pequeno exemplo de crud usando as tecnologia que compõem o nosso MVP
            </x-card>
        </div>
    </div>

    <div class="mt-4">
        <livewire:produtos.create/>
    </div>

    <div class="mt-4">
        <livewire:produtos.show/>
    </div>

@endsection
