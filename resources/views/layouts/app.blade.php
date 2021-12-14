@extends('layouts.base')

@section('body')

    <div class="flex flex-col  justify-start  min-h-screen py-12 bg-gray-100 sm:px-6 lg:px-8">
        <div  class="absolute top-0 right-0 mt-4 mr-4" >
            @if (Route::has('login'))
                <div class="space-x-4 ">
                    @auth
                        Candidato: {{Auth::user()->name}} |

                        <a x-show="open"
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
                        <a href="{{ route('login') }}"
                           class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="flex items-center justify-start mt ">
            <div class="flex flex-col justify-around">

                <a href="{{ route('home') }}">
                    <x-logo class="absolute mt-4 mr-4 top-0 left-0-0 w-16 h-6 mx-auto "/>
                </a>



            </div>
        </div>
       <x-card class="">
           <ul class="flex justify-between text-center text-lg">
               <li class="mr-6">
                   <a class=" @if(Route::currentRouteName() == 'home')text-blue-500 hover:text-blue-800 @endif text-gray-500 focus:border-gray-800 hover:text-gray-800" href="{{route('home')}}"  >Inicio</a>
               </li>
               <li class="mr-6">
                   <a class="@if(Route::currentRouteName() == 'indicador')text-blue-500 hover:text-blue-800 @endif text-gray-500 focus:border-gray-800 hover:text-gray-800"  href="{{route('indicador')}}">Indicadores</a>
               </li>
               <li class="mr-6">
                   <a class="@if(Route::currentRouteName() == 'playground')text-blue-500 hover:text-blue-800 @endif text-gray-500 focus:border-gray-800 hover:text-gray-800" href="{{route('playground')}}">PlayGround</a>
               </li>

           </ul>
       </x-card>
        <div class="mt-4">

            @yield('content')
            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
    </div>





@endsection

