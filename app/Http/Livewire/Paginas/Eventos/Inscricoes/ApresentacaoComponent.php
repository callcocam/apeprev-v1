<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos\Inscricoes;

class ApresentacaoComponent extends AbstractInscricaoComponent
{
     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function route(){
       \Route::get($this->path(true), static::class)->name($this->route_name());
    }

    public function view()
    {
        return 'livewire.paginas.eventos.inscricoes.apresentacao-component';
    }
}
