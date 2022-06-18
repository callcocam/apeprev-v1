<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Includes;

use App\Http\Livewire\AbstractPaginaComponent;
use Ramsey\Uuid\Uuid;

class NewslettersComponent extends AbstractPaginaComponent
{
    protected $rules = [
        'data.email' => 'required|email',
    ];

    public function view()
    {
        return 'livewire.includes.newsletters-component';
    }

    public function sendMail(){
        
        $this->validate();

        $this->data['name'] = Uuid::uuid4()->toString();
        if(\App\Models\Newsletter::query()->firstOrCreate($this->data)){
            $this->reset(['data']);
            $this->dialog()->success(
                $title = 'E-Mail cadastrado com sucesso',
                $description = 'Recebemos o seu cadastro, logo que houver alguma novidade, você será notificado:)'
            );
            return true;

        }
        return false;
    }
}
