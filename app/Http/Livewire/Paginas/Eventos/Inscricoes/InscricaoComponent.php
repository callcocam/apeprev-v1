<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos\Inscricoes;
use App\Models\Event;

class InscricaoComponent extends AbstractInscricaoComponent
{

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
                $this->inscricoes = $inscricoes->toArray();
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
    
    public function getParticipantesProperty()
    {
        return $this->instituicao->participantes;
    }
    
    public function edit($id)
    {
        $this->emit('edit', $id);
    }

    public function excluir($id)
    {
        dd('excluir', $id);
    }

    public function gerarBoleto($id)
    {
       dd('gerarBoleto', $id, data_get($this->hotel,$id, false));
    }

    public function selectCheckboxAll()
    {
          if (!$this->checkboxAll) {
            $this->checkboxValues = [];
            return;
        }

        collect($this->instituicao->participantes)->each(function ($model) {
            $this->checkboxValues[$model->id] = (string) $model->id;
        });
    }

    public function checkboxValuesCount()
    {
        $data = collect($this->checkboxValues)->filter(function($item){
            return $item !==false;
         });        
         return $data->count();
    }
    public function gerarLote()
    {
        sleep(2);
    }
}
