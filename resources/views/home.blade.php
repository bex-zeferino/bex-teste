@extends('layouts.app')

@section('content')
    <div class="flex flex-col  justify-start  min-h-screen py-12 bg-gray-100 sm:px-6 lg:px-8">
        <div class="absolute top-0 right-0 mt-4 mr-4">
            @if (Route::has('login'))
                <div class="space-x-4 text-white">
                    @auth
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="  font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                        >
                         Sair
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="flex items-center justify-start ">
            <div class="flex flex-col justify-around">

                    <a href="{{ route('home') }}">
                        <x-logo class="absolute mt-4 mr-4 top-0 left-0-0 w-16 h-6 mx-auto text-indigo-600" />
                    </a>




            </div>
        </div>
        <div class="mt-4">
        <livewire:produtos.produto />
        </div>

        <div class="mt-4">
            <livewire:produtos.show />
        </div>
    </div>
@endsection
