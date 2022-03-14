<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\View\Components;

use Illuminate\View\Component;

class TallHoverable extends Component
{
    protected $label, $header, $description;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $header=null, $description = null)
    {
        $this->label = $label;
        $this->header = $header;
        $this->description = $description;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tall-hoverable')->with('label', $this->label)->with('header', $this->header)->with('description', $this->description);
    }
}
