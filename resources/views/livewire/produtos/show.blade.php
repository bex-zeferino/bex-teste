<div>

    <x-card title="Lista de produtos">
        @foreach($produtos as $produto)
            <p class="text-gray-500">{{$produto->name}}</p>
        @endforeach
        {{$produtos->links() }}
    </x-card>
</div>
