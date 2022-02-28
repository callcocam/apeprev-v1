<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TallNavlink extends Component
{
    
    protected $component;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($component)
    {
        $this->component = app(sprintf("\App\Http\Livewire\Paginas\%s",$component));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tall-navlink')->with([
            'label'=>$this->component->label(),
            'route'=>$this->component->route_name(),
            'restrito'=>$this->component->restrito(),
            'icon'=>$this->component->icon(),
            'classes'=>$this->classes(),
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
        return 'relative flex py-5 px-2 lg:p-5 text-sm lg:text-base font-bold';
    }
    
    protected function classe_link(){
        return 'relative flex py-5 px-2 lg:p-5 text-sm lg:text-base font-bold';
    }
}
