<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associacao;

use App\Http\Livewire\AbstractPaginaComponent;

use App\Http\Livewire\Traits\WithPages;

class SobreNosComponent extends AbstractPaginaComponent
{
    use WithPages;
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
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function label(){
        return 'Sobre nós';
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
        return 'livewire.paginas.associacao.sobre-nos-component';
    }
}
