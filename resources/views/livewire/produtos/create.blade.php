<div>
    <form wire:submit.prevent="save">


        <x-card title="Cadastro de produtos">

            <x-input wire:model.lazy="name" label="Produto:" placeholder="Nome do produto" name="produto" />
            @error('name') <span class="error text-red-500" >{{ $message }}</span> @enderror

            <x-input wire:model.defer="price" label="Preço:" type="number" placeholder="Nome do produto" name="price" />
            @error('price') <span class="error text-red-500" >{{ $message }}</span> @enderror
            <x-textarea wire:model.defer="description"  label="Descrição:" placeholder="Descrição do produto" />


            <x-slot name="footer" class="place-items-end">

                <div class="@if($name) animate-pulse  @endif
                    ">
                    <x-button  type="submit" spinner="save" primary label="Salvar" />


                </div>




            </x-slot>

        </x-card>





    </form>
</div>
