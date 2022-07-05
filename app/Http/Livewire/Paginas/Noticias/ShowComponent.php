<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Noticias;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Post;

class ShowComponent extends AbstractPaginaComponent
{

    public $limit = 3;

    public function mount(Post $model){
           $this->setFormProperties($model);
    }

    public function query(){

        return Post::query()
        ->whereNotIn('id',[$this->model->id])
        ->where('type','post')
        ->orderByDesc('created_at');
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
    public function generate(){
        return false;
     }

    public function view()
    {
        return 'livewire.paginas.noticias.show-component';
    }
}
