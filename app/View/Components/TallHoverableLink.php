<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\View\Components;

use Illuminate\View\Component;

class TallHoverableLink extends Component
{
    protected $component;
    protected $border;
    protected $model;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($component, $border="r",$model=null)
    {
        $this->component = app(sprintf("\App\Http\Livewire\Paginas\%s",$component));
        $this->border = $border;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tall-hoverable-link')->with([
            'label'=>$this->component->label(),
            'description'=>$this->component->description(),
            'route'=>$this->component->route_name(),
            'restrito'=>$this->component->restrito(),
            'icon'=>$this->component->icon(),
            'classes'=>$this->classes(),
            'border'=>$this->border,
            'model'=>$this->model,
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
        return 'relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold';
    }
    
    protected function classe_link(){
        return 'relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold';
    }
}
