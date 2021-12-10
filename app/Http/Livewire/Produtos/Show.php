<?php

namespace App\Http\Livewire\Produtos;

use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    protected $listeners=['Produto::create'=>'$refresh'];
    public function render()
    {
        return view('livewire.produtos.show', [
            'produtos'=> \App\Models\Produto::orderBy('id','DESC')->paginate(10)
        ]);
    }
}
