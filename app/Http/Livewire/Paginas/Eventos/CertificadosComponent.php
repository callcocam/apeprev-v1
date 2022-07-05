<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos;

use App\Http\Livewire\AbstractPaginaComponent;

class CertificadosComponent extends AbstractPaginaComponent
{

     /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicializar o component
    |
    */
    public function mount()
    {
    
        $this->rows['certificados']=[];
      
        if (\Storage::disk('public')->exists('events/imports/eventosApeprev.xlsx')) {
            $certificados=(new \App\Imports\EventsImport)->toCollection('events/imports/eventosApeprev.xlsx');
            $certificados = $certificados[0];
            unset($certificados[0]);
            $this->rows['certificados']= $certificados->sortDesc()->toArray();
        }
      
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
    |  Features icon
    |--------------------------------------------------------------------------
    | icon visivel no me menu
    |
    */
    public function icon(){
        return 'identification';
     }

      /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function label(){
        return "Certificados";
     }
     /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function description(){
        return "Baixe o certificados dos eventos";
     }

    public function view()
    {
        return 'livewire.paginas.eventos.certificados-component';
    }
}
