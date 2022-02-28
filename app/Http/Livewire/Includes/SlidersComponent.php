<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Includes;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Slide;

class SlidersComponent extends AbstractPaginaComponent
{

    public function mount(Slide $model)
    {
        $this->setFormProperties($model);
    }
   
    public function query(){
        return  $this->model->limit($this->perPage);
    }

    public function view()
    {
        return 'livewire.includes.sliders-component';
    }

    
    public function getSlidesProperty(){
        if ($query = $this->query()) {
            $query->whereDate("start_date", "<=", now()->format('Y-m-d'));
            $query->whereDate("end_date", ">=", now()->format('Y-m-d'));
            return $query->get();
        }
        return [];
     }
}
