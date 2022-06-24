<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Relatorios\Includes;

use App\Models\Relatorio;
use Tall\Form\FormComponent;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Radio;

class ColumnComponent extends FormComponent
{

    public $column;
    public $cardModal;
    public $name;

    public $listeners = ['openModal'];
     /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro selecionado
    |
    */
    public function mount(?Relatorio $model, $column, $name)
    {
        
        $this->setFormProperties($model); 
        
        $this->column = $column;
        $this->name = $name;
    }
   
    /*
    |--------------------------------------------------------------------------
    |  Features fields
    |--------------------------------------------------------------------------
    | Inicia a configuração do campos disponiveis no formulario
    |
    */
    protected function fields(): array
    {
        return [
            Input::make('Name')->rules('required'),
            Radio::make('Status', 'status_id')->status()->lg()
        ];
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

     public function save(){

     }
     
     public function delete(){

    }
    
    public function view()
    {
        return 'livewire.admin.relatorios.includes.column-component';
    }
}
