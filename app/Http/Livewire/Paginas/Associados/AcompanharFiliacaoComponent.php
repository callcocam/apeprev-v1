<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associados;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Instituicao;
use Illuminate\Support\Facades\Http;
use  App\Http\Livewire\Paginas\Associados\Includes\Traits\TraitInstituicao;

class AcompanharFiliacaoComponent extends AbstractPaginaComponent
{
    use TraitInstituicao;

    public $cancelarConfirm = false;

     protected $queryString = [
        'year' => ['except' => '']
    ];

    public $year;

    public function mount()
    {
        $this->year = request()->query('year', date("Y"));
        $this->setFormProperties(auth()->user()->instituicao);

    }
    public function getInstituicaoProperty()
    {
        if($user = auth()->user()){
            if($instituicao = $user->instituicao){
                return $instituicao;
            }
        }
      return null;
    }

    public function getFiliacaoProperty()
    {
        if($user = auth()->user()){
            if($instituicao = $user->instituicao){
                if($instituicao_vigente = $instituicao->instituicao_vigente()->where('year',$this->year)->first()){
                    return $instituicao_vigente;
                }
            }
        }
      return null;
    }

     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function route(){
       \Route::get($this->path(), static::class)->middleware(['auth:sanctum'])->name($this->route_name());
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
        return 'livewire.paginas.associados.acompanhar-filiacao-component';
    }

}
