<div x-data="{ open: false }"  x-cloak class=" flex justify-center mt-4 ">
    <button @click="open = ! open"
            x-bind:class="[open ? '': 'animate-pulse' ]"
            class="text-2xl font-medium rounded-full bg-indigo-600 hover:bg-indigo-500 focus:border-gray-800 text-white p-2.5">
        <x-icon name="clipboard-check" class="w-5 h-5"/>
    </button>
    <br>
    <div x-show="open"

         class="ml-2">
        <x-card>
            📊  Indicador é uma forma de agregar valor para seu cliente, ele traz o que é mais importante e ajuda na tomada de decisão.
        </x-card>
    </div>
</div>


<div class="my-2">

    <x-card class="border-info-800 my-2  " title="Indicadores">


        <div wire:loading.class="hidden" class="text-center grid grid-cols-2 gap-2">


            <div class=" bg-white p-3 border shadow-md shadow-red rounded-md">

                <p class="font-bold-500 text-xl">{{$totalProduto }}</p>
                <p class="">Quantidade de Produtos Cadastrado</p>
            </div>

            <div class=" bg-white p-3 border shadow-md shadow-red rounded-md">

                <p class="font-bold-500 text-xl">{{ $produtoMaisCaro ? json_decode($produtoMaisCaro)->name.' R$ '.json_decode($produtoMaisCaro)->price : 'Não existe produto'}} </p>
                <p class="">Produto Mais Caro</p>
            </div>
        </div>


    </x-card>
</div>
