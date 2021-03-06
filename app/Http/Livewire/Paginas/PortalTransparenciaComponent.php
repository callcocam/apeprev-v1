<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Transparencias\Transparencia;

class PortalTransparenciaComponent extends AbstractPaginaComponent
{

    public function query(){

        return Transparencia::query()->orderByDesc("reference_date");
    }
    
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
    public function label(){
        return "TRANSPARÊNCIA";
     }


    public function view()
    {
        return 'livewire.paginas.portal-transparencia-component';
    }
}
