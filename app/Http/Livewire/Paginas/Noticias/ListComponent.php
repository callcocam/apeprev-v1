<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Noticias;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Post;

class ListComponent extends AbstractPaginaComponent
{

    public function query(){

      return Post::query()->where(published())->where('type','post')->orderByDesc('created_at');
    }

    protected function models(){

      $this->rows['destaque'] = $this->query()->where('type','post')->first();
      // $this->rows['destaque'] = $this->query()->first();

      return parent::models();
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
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function label(){
        return "NOTÍCIAS";
     }

    public function view()
    {
        return 'livewire.paginas.noticias.list-component';
    }
}
