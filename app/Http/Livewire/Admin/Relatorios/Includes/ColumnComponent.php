<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Relatorios\Includes;
use App\Models\Relatorio;

use App\Http\Livewire\AbstractPaginaComponent;

class ColumnComponent extends AbstractPaginaComponent
{

    public $column;
    public $cardModal;

    protected $listeners = ['openModal'];
     /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro selecionado
    |
    */
    public function mount(?Relatorio $model, $column, $cardModal=false)
    {
        
        $this->setFormProperties($model); 
        
        $this->column = $column;
        $this->cardModal = $cardModal;
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
    public function openModal($column){
        if($column == $this->column)
            $this->cardModal = true;
     }

     public function save(){

     }
     
     public function delete(){

    }
    
    public function view()
    {
        return 'livewire.admin.relatorios.includes.column-component';
    }
}
