<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos\Inscricoes;

class LoginComponent extends AbstractInscricaoComponent
{
    public $cardModal = true;

    

    public function view()
    {
        return 'livewire.paginas.eventos.inscricoes.login-component';
    }

    public function cancel()
    {
        return redirect(request()->header('Referer'));
    }

    
    public function save()
    {
        return redirect(request()->header('Referer'));
    }
}
