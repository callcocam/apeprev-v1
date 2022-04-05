<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Auth;

use App\Http\Livewire\AbstractPaginaComponent;

class RegisterComponent extends AbstractPaginaComponent
{
    public $createNew = false;
     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function mount($data){
        if(data_get($data, 'intituition')){
            $this->createNew =true;
        }
       $this->data = $data;
    }

    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function order(){
        return 1000;
     }

    public function view()
    {
        return 'livewire.paginas.auth.register-component';
    }

    public function updatedDataInstituicaoId($value)
    {
        if($instituicao = \App\Models\Instituicao::find($value)){
           $this->createNew =false;
        }
        else{
            $this->createNew =true;
        }
    }
}
