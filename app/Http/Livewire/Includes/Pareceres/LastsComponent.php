<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Includes\Pareceres;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Parecer;

class LastsComponent extends AbstractPaginaComponent
{

    public function query(){
       return Parecer::query()->where(published())->orderByDesc('created_at')->limit(5);
    }

    public function view()
    {
        return 'livewire.includes.pareceres.lasts-component';
    }
}
