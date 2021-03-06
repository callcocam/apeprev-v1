<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\View\Components;

use Illuminate\View\Component;

class TallToggleableLink extends Component
{
   
    protected $component;
    protected $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($component,$model=null, $path = "Paginas")
    {
        $this->component = app(sprintf("\App\Http\Livewire\\%s\\%s",$path,$component));
       
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
      
        return view('components.tall-toggleable-link')->with([
            'label'=>$this->component->label(),
            'route'=>$this->component->route_name(),
            'restrito'=>$this->component->restrito(),
            'icon'=>$this->component->icon(),
            'classes'=>$this->classes(),
            'model'=>$this->model ?? $this->component->model(),
        ]);
    }

    
    public function classes()
    {
       if(request()->routeIs($this->component->route_name())){
           return  $this->classe_active();
       }
        
        return $this->classe_active();
    }

    protected function classe_active(){
        return 'flex px-2 py-2 hover:bg-gray-100 text-gray-700 hover:text-gray-800';
    }
    
    protected function classe_link(){
        return 'flex px-2 py-2 hover:bg-gray-100 text-gray-900 hover:text-gray-800';
    }
}
