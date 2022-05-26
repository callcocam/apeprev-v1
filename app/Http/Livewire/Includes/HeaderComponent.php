<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Includes;

use Livewire\Component;

class HeaderComponent extends Component
{
    public function render()
    {
        return view('livewire.includes.header-component')->with('tenant', app('currentTenant'));;
    }
}
