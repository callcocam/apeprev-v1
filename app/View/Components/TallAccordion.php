<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\View\Components;

use Illuminate\View\Component;

class TallAccordion extends Component
{
    protected $accordion;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($accordion = "01")
    {
       $this->accordion = $accordion;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tall-accordion')->with('accordion', $this->accordion);
    }
}
