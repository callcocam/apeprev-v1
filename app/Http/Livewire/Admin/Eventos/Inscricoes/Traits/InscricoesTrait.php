<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Eventos\Inscricoes\Traits;
/**
 * Compartilhas as funcoes do admin com a paginas
 */
trait InscricoesTrait
{
    
    
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
       if($incrito = \App\Models\EventoInscrito::find( $id )){
        $incrito->delete();
        return true;
       }
   }

   public function gerarBoleto($id)
   {
      $data =[
          "instituicao_id"=>$this->instituicao->id,
          "event_id"=>$this->model->id,
          "evento_inscricao_id"=>data_get($this->inscricoes,'id', false),
          "hotel"=>data_get($this->data,sprintf("hotel.%s", $id), false),
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
                    "hotel"=>data_get($this->data,sprintf("hotel.%s", $value), false),
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
   
   
   public function getInscrito($model,$instituicao,$inscricoes, $item, $lote)
   {
       return \App\Models\EventoInscrito::query()->where([
        'event_id' => $model->id,
        'event_id' => data_get($model, 'id', false),
        'instituicao_id' => data_get($instituicao, 'id', false),
        'evento_inscricao_id' => data_get($inscricoes, 'id', false),
        'lote' => $lote,
        'user_id' => $item->id,
        ])->first();
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
