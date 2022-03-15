<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DashboardComponent extends Component
{

    use AuthorizesRequests;
     /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount()
    {
        $this->authorize(Route::currentRouteName());
    }

        /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */

    public function route(){

        \Route::get('', static::class)->name('admin');
        \Route::get('/dashboard', static::class)->name('dashboard');
    }

    public function render()
    {
        return view('livewire.admin.dashboard-component')->layout(theme_layout("app"));
    }
}
