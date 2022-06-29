<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Relatorios\Includes;


use App\Models\Relatorio;
use Tall\Form\FormComponent;

class OrderingComponent extends FormComponent
{
    
    public $cardModal;
    public $updated = false;
    
     /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro selecionado
    |
    */
    public function mount(?Relatorio $model)
    {
        
        $this->setFormProperties($model); 
        
    }

    public function getColunasProperty(){
        return $this->model->colunas()->orderBy('ordering')->get();
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
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function updateColunaOrder($data){
      if($data){
         foreach($data as $order){
            $this->model->colunas()->where('id',data_get($order, 'value'))->update([
                "ordering"=>data_get($order, 'order')
            ]);
         }
         $this->updated = true;
      }
     }
  /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | updateGroupOrder visivel no me menu
    |
    */
    public function updateRelacionamentoOrder($data){
        if($data){
            foreach($data as $order){
                if($coluna =  $this->model->colunas()->where('id',data_get($order, 'value'))->first()){
                    if($items = data_get($order, 'items')){
                        foreach($items as $item){
                                if($relacionamento =  $coluna->relacionamentos()->where('id',data_get($item, 'value'))->first()){
                                    $relacionamento->update([
                                        "ordering"=>data_get($item, 'order')
                                    ]);
                                }
                            }
                        }
                    }
                }
                $this->updated = true;
             }
     }

      /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function openModal(){
        $this->cardModal = true;            
     }

      /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function closeModal(){
        if($this->updated)
            return redirect()->route('admin.relatorio.gerenciar', $this->model);         
     }


    public function view()
    {
        return 'livewire.admin.relatorios.includes.ordering-component';
    }
}
