<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos;

use App\Http\Livewire\AbstractPaginaComponent;

class CertificadoComponent extends AbstractPaginaComponent
{

    public function mount($model)
    {
        $certificados=(new \App\Imports\EventsImport)->toCollection('events/imports/eventosApeprev.xlsx');
        $certificados = $certificados[0];
        unset($certificados[0]);
        $this->rows['id']= $model;
        $this->rows['certificado']= $certificados->where(0,$model)->first()->toArray();
    }

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
        return 'livewire.paginas.eventos.certificado-component';
    }
}
