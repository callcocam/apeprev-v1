<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associados;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Instituicao;

class RecadastreSeComponent extends AbstractPaginaComponent
{
    
    
    public $data = [
        "document"  =>"",
        "phone"     =>null,
        "whatsapp"  =>null,
    ];

     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function route(){
      
       \Route::get($this->path(), static::class)->name('associados.recadastre-se');
       \Route::get($this->path(true), static::class)->name('associados.associe-se.finalizar');
    }


    public function mount(?Instituicao $model)
    {
    
        $this->setFormProperties($model);
    }
  
    /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function route_name($sufix=null){
       return 'associados.recadastre-se';
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

        if($this->model && $this->model->exists)
           return 'livewire.paginas.associados.recadastre-se-component';

        return 'livewire.paginas.associados.associe-se-document-component';
        
    }
}
