<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\View\Components;

use Illuminate\View\Component;

class TallLink extends Component
{


    protected $component;
    protected $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($component, $model=null)
    {
        $this->model =$model;
        $this->component = app(sprintf("\App\Http\Livewire\Paginas\%s",$component));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tall-link')->with([
            'label'=>$this->component->label(),
            'route'=>$this->component->route_name(),
            'restrito'=>$this->component->restrito(),
            'icon'=>$this->component->icon(),
            'classes'=>$this->classes(),
            'model'=>$this->model,
        ]);
    }

    public function classes()
    {
       if(request()->routeIs($this->component->route_name())){
           return  $this->classe_active();
       }
        
        return $this->classe_link();
    }

    protected function classe_active(){
       if(method_exists($this->component, 'classe_active')){
        return $this->component->classe_active();
       }
        return 'text-white hover:text-blue-600';
    }
    
    protected function classe_link(){
        if(method_exists($this->component, 'classe_link')){
            return $this->component->classe_link();
           }
        return 'text-white hover:text-blue-600';
    }
}
