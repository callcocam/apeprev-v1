<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Servicos;

use App\Http\Livewire\AbstractPaginaComponent;

class LinkComponent extends AbstractPaginaComponent
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
        return 'livewire.paginas.servicos.link-component';
    }
}
