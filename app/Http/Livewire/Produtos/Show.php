<?php

namespace App\Http\Livewire\Produtos;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Show extends Component
{
    use WithPagination;

    use Actions;
    public string $search ='';



    #escuta todos eventos emitidos e toma uma ação
    protected $listeners=[
        'Produto::create'=>'$refresh',
        'Produto::delete'=>'$refresh'
    ];
       # reseta a paginação
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.produtos.show', [
            'produtos'=> \App\Models\Produto::orderBy('id','DESC')
                ->when($this->search, fn($q)=> $q->where('name','like' ,'%'.$this->search.'%') )
                ->paginate('10')
        ]);
    }

    public function message(Produto $produto )
    {
        $this->dialog()->confirm([
            'title'       => 'Ola, você esta preste a deletar o produdo '.strtoupper($produto->name),
            'description' => 'Deseja continuar?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Sim, deletar',
                'method' => 'delete',
                'params' => $produto,
            ],
            'reject' => [
                'label'  => 'No, cancel',
                'method' => 'render',
            ],
        ]);
    }

    public function delete($produto)
    {
            Produto::where('id', $produto)->delete();
        $this->notification()->notify([
            'title'       => 'Sucesso!',
            'description' => 'Seu produto foi deletado',
            'icon'        => 'success',
            'timeout'     =>    1000
        ]);

                $this->emit('Produto::delete');
    }
}
