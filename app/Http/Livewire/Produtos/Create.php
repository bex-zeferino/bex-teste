<?php

namespace App\Http\Livewire\Produtos;

use App\Models\Produto;
use Livewire\Component;
use WireUi\Traits\Actions;

class Create extends Component
{
    use Actions;
    public string $name="";
    public int $price=0;
    public string $description="";

    protected $rules=[
        'name'=>['required','min:6'],
        'price'=>['required', 'min:0', 'max:7'],



    ];
    public function render()
    {
        return view('livewire.produtos.create');
    }
    # "parse para portugues" das mensagem de erro
    protected $messages = [
        'name.required' => 'O campo Nome é obrigatório.',
        'name.min' => 'O campo Nome deve ter no minimo 6 caracteres. ',
        'price.max' => 'O preço deve ter no maximo 7 caracteres. ',
    ];

    #metodo para salvar no banco de dados
    public function save(): void
    {
        $this->validate();
            Produto::query()->create([
            'name' =>  $this->name,
            'price' =>$this->price,
            'description' =>$this->description
        ]);
        $this->notification()->notify([
            'title'       => 'Sucesso!',
            'description' => 'Seu Produto foi salvo com sucesso',
            'icon'        => 'success',
            'timeout'     =>    2000

        ]);

        #emite um evento de crate do produto
        $this->emit('Produto::create');

        $this->clean();
    }

    private function clean(){
        $this->name="";
        $this->description="";
        $this->price=0;

    }
}
