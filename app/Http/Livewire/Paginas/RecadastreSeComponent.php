<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas;

use App\Http\Livewire\Paginas\Associados\RecadastreSeComponent as AbstractPaginaComponent;
use Illuminate\Support\Facades\Mail;

class RecadastreSeComponent extends AbstractPaginaComponent
{

   
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function label(){
        return "RECADASTRE-SE";
     }

}
