<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associacao;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Certidao;

class CertidoesComponent extends AbstractPaginaComponent
{
     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function route(){
       \Route::get($this->path(), static::class)->name($this->route_name());
    }

    
    public function query(){

        return Certidao::query()->orderBy("ordering");
    }

    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function label(){
        return "Certidões";
     }

    public function view()
    {
        return 'livewire.paginas.associacao.certidoes-component';
    }
}
