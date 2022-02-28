<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TallToggleableDropdown extends Component
{
    protected $label;
    protected $border;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $border="r")
    {
        $this->label = $label;
        $this->border = $border;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tall-toggleable-dropdown')->with([
            'label'=>$this->label,
            'border'=>$this->border,
        ]);
    }
}
