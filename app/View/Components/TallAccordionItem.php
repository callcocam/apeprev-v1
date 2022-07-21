<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\View\Components;

use Illuminate\View\Component;

class TallAccordionItem extends Component
{

    protected $collapse;
    protected $collapsed;
    protected $label;
    protected $active;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($collapse, $label, $active=null)
    {
       $this->collapse = $collapse;
       $this->label = $label;
       $this->active = $active;
       $this->collapsed = $active ? '':'collapsed';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tall-accordion-item')->with('collapse',$this->collapse)->with('label',$this->label)->with('active',$this->active)->with('collapsed',$this->collapsed);
    }
}
