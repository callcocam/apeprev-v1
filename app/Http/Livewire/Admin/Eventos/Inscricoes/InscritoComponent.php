<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Eventos\Inscricoes;

use App\Models\Event;
use Livewire\Component;

class InscritoComponent extends Component
{

    public $inscricoes;
    public $instituicao;
    public $model;
    public $data;
    protected $layout = "app";
    public bool $checkboxAll = false;
    public $checkboxValues = [];
    public $hotel = [];
   
   /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount(?Event $model)
    {
        $this->setFormProperties($model); // $model from hereon, called $this->model
        if($instituicao = auth()->user()->instituicao){
            $this->instituicao = $instituicao;
            if( $inscricoes = $model->inscricoes()->where('instituicao_id',$instituicao->id)->first()){
                $this->inscricoes = $inscricoes;
              
            }
        }
    }
 /**
     * @param null $model
     */
    protected function setFormProperties($model = null)
    {
        $this->model = $model;
        if ($model) {
            $this->data = $model->toArray();
        } else if (is_array($model)) {
            $this->data = $model;
        }
    }
    
    public function render(){
      
        return view($this->view())
        ->layout($this->layout());
    }
   
    protected function view(){
        return "livewire.admin.eventos.inscricoes.inscrito-component";
    }

    
   protected function layout(){
    if(function_exists("theme_layout")){
        return theme_layout($this->layout);
     }
     return config('tall-forms.layout');
   }

   public function getParticipantesProperty()
   {
    if($instituicao = $this->instituicao){
        return $instituicao->participantes;
    }       
   }
   
   public function getInscritoProperty()
   {
    if($inscritos = $this->inscricoes->inscritos){
        return $instituicao->participantes;
    }       
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
     dd(data_get($this->hotel,$id, false));
      $data =[
          "instituicao_id"=>$this->instituicao->id,
          "event_id"=>$this->model->id,
          "evento_inscricao_id"=>data_get($this->inscricoes,'id', false),
          "hotel_id"=>data_get($this->hotel,'id', false),
          "lote"=>0,
          "desconto"=>"",
          "valor"=>$this->plano()->valor,
          "user_id"=>$id,
      ];
      $this->inscricoes->inscritos()->create($data);
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
    if($this->checkboxValuesCount()){
        foreach($this->checkboxValues as $value){
            if(data_get($this->checkboxValues,$value, false)){
                $data =[
                    "instituicao_id"=>$this->instituicao->id,
                    "event_id"=>$this->model->id,
                    "evento_inscricao_id"=>data_get($this->inscricoes,'id', false),
                    "hotel_id"=>data_get($this->hotel,'id', false),
                    "lote"=>1,
                    "desconto"=>"",
                    "valor"=>$this->plano()->valor,
                    "user_id"=>$value,
                ];                
                $this->inscricoes->inscritos()->create($data);
            }
        }
    }
   }

   
   
   public function getPlanoProperty()
   {
       //Tem que ter o tipo da instituição
      
       return $this->plano();
   }

   
   private function plano()
   {
       //Tem que ter o tipo da instituição
       if($instituicoes_tipo = $this->instituicao->instituicoes_tipo){
        if($evento_planos = $instituicoes_tipo->evento_planos){             
            return data_get($evento_planos,0);
        }
     }
         return null;
   }

}
