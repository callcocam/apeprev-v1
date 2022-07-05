<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associados;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Instituicao;

class AssociadosComponent extends AbstractPaginaComponent
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

        if($instituicao_tipo = \App\Models\InstituicaoTipo::query()->where("slug",config('instituicao.tipo.slug.acossiado','associados'))->first()){
            return Instituicao::query()->where("instituicao_tipo_id", $instituicao_tipo->id)->orderBy("name");
        }
    }
    
   /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function label(){
        return "RPPS Associados";
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
        return 'livewire.paginas.associados.associados-component';
    }
}
