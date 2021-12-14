<div x-data="{ open: false }" class=" flex justify-center mt-4 ">
    <button @click="open = ! open"
            class="text-2xl font-medium rounded-full bg-indigo-600 hover:bg-indigo-500 focus:border-gray-800 text-white p-2.5">
        <x-icon name="clipboard-check" class="w-5 h-5"/>
    </button>
    <br>
    <div x-show="open" class="ml-2">
        <x-card>
            Indicador é uma forma de agregar valor para seu cliente, ele tras o que é mais importante para ele.
        </x-card>
    </div>
</div>
<div class="mt-4">


    <x-card class="border-info-800 mt-4" title="Indicadores">
        <div class="border-info-800 text-2xl bg-gray-500 text-white text-center mt-4" title="">
            <p >{{$totalProduto }}</p>
            Total de Produtos
        </div>

{{--        @dd($produtoMaisCaro)--}}
        <div   class=" mt-2 border-info-800 bg-gray-500 text-2xl text-white text-center mt-4" title="">

                <p >{{ $produtoMaisCaro ? json_decode($produtoMaisCaro)->name.' R$ '.json_decode($produtoMaisCaro)->price : 'Não existe produto'}} </p>

            Produto mais Caro
        </div>
    </x-card>
</div>
