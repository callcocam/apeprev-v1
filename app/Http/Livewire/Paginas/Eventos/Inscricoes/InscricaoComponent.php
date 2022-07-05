<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos\Inscricoes;
use App\Models\Event;
use App\Http\Livewire\Admin\Eventos\Inscricoes\Traits\InscricoesTrait;

class InscricaoComponent extends AbstractInscricaoComponent
{

    use InscricoesTrait;

    public $inscricoes;
    public $instituicao;
    public bool $checkboxAll = false;
    public $checkboxValues = [];
    public $hotel = [];

     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function route(){
       \Route::middleware(['web','auth:sanctum', 'verified'])->get($this->path(true), static::class)->name($this->route_name());
    }

    
   public function mount(Event $model)
   {
    if(auth()->user()->can('create', \App\Models\EventoInscricao::class)){
        parent::mount($model);
        if($instituicao = auth()->user()->instituicao){
            $this->instituicao = $instituicao;
            if( $inscricoes = $model->inscricoes()->where('instituicao_id',$instituicao->id)->first()){
                $this->inscricoes = $inscricoes;
            }
        }
    }
    else{
        return redirect()->route('home');
    }
   }

    public function view()
    {
        return 'livewire.paginas.eventos.inscricoes.inscricao-component';
    }
    
}
