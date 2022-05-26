<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Eventos\Inscricoes;

use App\Models\Event;
use Livewire\Component;
use App\Http\Livewire\Admin\Eventos\Inscricoes\Traits\InscricoesTrait;

class InscritoComponent extends Component
{

    use InscricoesTrait;

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

}
