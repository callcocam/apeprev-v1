<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associados;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Parecer;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ParecerComponent extends AbstractPaginaComponent
{
    use AuthorizesRequests;
    
     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function route(){
        \Route::get($this->path(true), static::class)->middleware(['auth:sanctum'])->name('associados.parecer.show');
     }

    public function mount(Parecer $model){
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);
    }


    public function view()
    {
        return 'livewire.paginas.associados.parecer-component';
    }
    
}
