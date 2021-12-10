<?php

namespace App\Http\Livewire\Produtos;

use Livewire\Component;
use WireUi\Traits\Actions;
class Produto extends Component
{
    use Actions;
    public string $name="";
    public int $price=0;
    public string $description="";

    protected $rules=[
        'name'=>'required',
        'price'=>['required', 'min:0', 'max:7'],



    ];

    public function render()
    {
        return view('livewire.produtos.produto');
    }

    # "parse para portugues" das mensagem de erro
    protected $messages = [
        'name.required' => 'O campo Nome é obrigatório.',

        'price.max' => 'O preço deve ter no maximo 7 caracteres. ',
    ];

    #metodo para salvar no banco de dados
    public function save(): void
    {
        $this->validate();
      \App\Models\Produto::query()->create([
         'name' =>  $this->name,
          'price' =>$this->price,
          'description' =>$this->description
      ]);
        $this->notification()->notify([
            'title'       => 'Sucesso!',
            'description' => 'Seu Produto foi salvo com sucesso',
            'icon'        => 'success',

        ]);


      $this->emit('Produto::create');

        $this->clean();
    }

    private function clean(){
        $this->name="";
        $this->description="";
        $this->price=0;

    }


}
