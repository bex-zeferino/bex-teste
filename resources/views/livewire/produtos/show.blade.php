<div>

    <x-card title="Lista de produtos">
        <x-input  class="border-info-800" wire:model.defer="search" label="Pesquisar prodruto:" placeholder="Pesquise o produto">
            <x-slot name="append">
                <div  class="absolute inset-y-0 right-0 flex items-center p-0.5">

                    <x-button
                        class=" rounded-r-md h-full  "
                        wire:click="render"
                        icon="search"
                        primary
                        flat
                        squared
                    />
                </div>
            </x-slot>
        </x-input>

        <div class="overflow-auto h-52 mt-4">
            <div class="text-center border shadow text-gray-800 text-2xl">Produtos Cadastrados</div>
            <table wire:loading.class="hidden"
                   class="table-auto border-collapse w-full mt-4">
                <thead>
                <tr class="rounded-lg text-sm font-medium text-gray-700 text-left table-row"
                    style="font-size: 0.9674rem">
                    <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Nome
                    </th>

                    <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Descrição
                    </th>
                    <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Preço
                    </th>

                    <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">
                       Ação
                    </th>
                </tr>

                </thead>
                <tbody class="text-sm font-normal text-gray-700 w-full">

                @foreach($produtos as $key => $row)


                    <tr class="hover:bg-gray-100 border-b border-gray-200 py-2 ">

                        <td class="px-4 py-1">{{$row->name}}</td>
                        <td class="px-4 py-1">{{$row->description}}</td>
                        <td class="px-4 py-1">{{$row->price }}</td>
                        <td class="px-4 py-1 flex-row">

                            <x-button wire:click="message({{$row->id}},'{{$row->name}}')"  icon="x" negative />

                        </td>


                    </tr>

                @endforeach

                </tbody>

            </table>
        </div>

        <div class="mt-4">
            {{$produtos->links() }}
        </div>
    </x-card>
</div>
