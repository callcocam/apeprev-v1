<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire;


use Livewire\{Component, WithPagination};

abstract class AbstractPaginaComponent extends Component
{
    use WithPagination;

    public $model;
    
    public $data;

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
        ->with('model', $this->model)
        ->with('models', $this->models());
    }


    protected function models(){
        if($this->query()){
            return $this->query()->simplePaginate($this->perPage);
        }
        return null;
    }

     /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function label(){
        $label = \Str::replace("-", " ",$this->format_name());
        $label = \Str::replace("paginas.", "",$label);
        $class_name =\Str::afterLast(get_class($this),"\\");
        //$label = \Str::lower($class_name);
        $label =\Str::afterLast( $label,".");
        return \Str::title($label);
     }
 
     /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function path(){
        $path = \Str::replace("-", "/",$this->format_name());
        $path = \Str::replace(".", "/",$path);
        $path = \Str::replace("paginas/", "",$path);
        $path = \Str::replace("/list", "",$path);
        return $path;
     }
     
    /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function route_name(){
        return $this->format_name();
     }
     
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function order(){
        return 1;
     }

    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function icon(){
        return null;
     }

    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function description(){
        return null;
     }
     
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function generate(){
        return true;
     }
     
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Restrito visivel no me menu
    |
    */
    public function restrito(){
        return true;
     }
     /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function format_name(){
        $name = \Str::afterLast($this->view(),"livewire.");
        return \Str::beforeLast($name,"-component");
     }

}