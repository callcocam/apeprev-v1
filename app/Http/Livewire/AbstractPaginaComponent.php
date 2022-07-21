<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire;


use Livewire\{Component, WithPagination};
use WireUi\Traits\Actions;
use Tall\Theme\Traits\WithMenus;

abstract class AbstractPaginaComponent extends Component
{
    use WithPagination, Actions,WithMenus;

    public $model;
    
    public $data;
    
    public $rows=[];

    protected $perPage = 12;
    
   abstract protected function view();
   
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

   protected function query()
   {
       return null;
   }

    public function render()
    {
        return view($this->view())
        ->with('models', $this->models())
        ->with('model', $this->model)
        ->with($this->rows);
    }


    protected function models(){
        if($this->query()){
            return $this->query()->simplePaginate($this->perPage);
        }
        return null;
    }


}
