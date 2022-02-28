<?php

namespace App\Http\Livewire\Includes;

use Livewire\Component;

class MenuComponent extends Component
{

    protected function components(){
        return ;
    }
    
    protected function menus(){
        return \App\ComponentParser::generateMenu(app_path('Http/Livewire/Paginas'));
    }

    public function render()
    {   
        return view('livewire.includes.menu-component');
    }
}
