<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Event;

class ListComponent extends AbstractPaginaComponent
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

        return Event::query()->orderByDesc('start');
    }
      /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function label(){
        return "Eventos";
     }
    /*
    |--------------------------------------------------------------------------
    |  Features icon
    |--------------------------------------------------------------------------
    | icon visivel no me menu
    |
    */
    public function icon(){
        return 'chat';
     }

     /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function description(){
        return "Acompanhe aqui os últimos eventos patrocinados pela APEPREV";
     }

    public function view()
    {
        return 'livewire.paginas.eventos.list-component';
    }
}
