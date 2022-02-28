<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas;

use App\Http\Livewire\AbstractPaginaComponent;

class DashboardComponent extends AbstractPaginaComponent
{
    
    /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */

    public function route(){
        \Route::get('', static::class)->name($this->route_name());
    }

    public function view()
    {
        return 'livewire.paginas.dashboard-component';
    }
}
