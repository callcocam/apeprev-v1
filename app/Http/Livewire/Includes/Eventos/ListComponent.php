<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Includes\Eventos;

use App\Models\Event;
use App\Http\Livewire\AbstractPaginaComponent;

class ListComponent extends AbstractPaginaComponent
{

    public function mount($limit=3)
    {
        $this->limit = $limit;
    }
    public function query(){
        return Event::query()->orderByDesc('start')->limit($this->limit);
    }
    protected function models(){
        if($this->query()){
            return $this->query()->get();
        }
        return null;
    }
    public function view()
    {
        return "livewire.includes.eventos.list-component";
    }
}
