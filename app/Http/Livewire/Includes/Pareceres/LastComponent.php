<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Includes\Pareceres;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Parecer;

class LastComponent extends AbstractPaginaComponent
{
    public function mount(Parecer $model)
    {
       $this->setFormProperties($model);
    }
    public function view()
    {
        return 'livewire.includes.pareceres.last-component';
    }
}
