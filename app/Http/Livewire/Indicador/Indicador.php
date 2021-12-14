<?php

namespace App\Http\Livewire\Indicador;

use App\Models\Produto;
use Livewire\Component;

class Indicador extends Component
{
    public int $totalProduto;
    public string $produtoMaisCaro;

    protected $listeners = [
        'Produto::create' => '$refresh',
        'Produto::delete' => '$refresh'
    ];


    public function mount()
    {
        $this->totalProduto = Produto::count();

     !$this->totalProduto ? : $this->produtoMaisCaro = Produto::select('name','price')
                                                        ->orderBy('price','desc')->first();

    }




    public function render()
    {
        return view('livewire.indicador.indicador');
    }
}

