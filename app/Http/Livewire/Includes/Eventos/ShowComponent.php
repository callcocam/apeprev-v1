<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Includes\Eventos;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Event;

class ShowComponent extends AbstractPaginaComponent
{
    public function mount(Event $model)
    {
       $this->setFormProperties($model);
    }

    public function view()
    {
        return 'livewire.includes.eventos.show-component';
    }
}
