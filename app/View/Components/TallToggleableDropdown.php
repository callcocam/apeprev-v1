<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\View\Components;

use Illuminate\View\Component;

class TallToggleableDropdown extends Component
{
    protected $label;
    protected $border;
    protected $width;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $border="r",$width="w-1/5")
    {

        $this->label = $label;
        $this->border = $border;
        $this->width = $width;
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
            'width'=>$this->width,
        ]);
    }
}
