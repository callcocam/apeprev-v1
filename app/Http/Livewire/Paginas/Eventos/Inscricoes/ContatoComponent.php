<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos\Inscricoes;

use App\Models\Event;

class ContatoComponent extends AbstractInscricaoComponent
{

    public $form_data = [];

    public function mount(Event $model)
    {
       $this->setFormProperties($model);
       $this->form_data['name'] = auth()->user()->name;
       $this->form_data['email'] = auth()->user()->email;
       $this->form_data['event_id'] = $model->id;
       $this->form_data['mesage'] = '';

    }

     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function route(){
       \Route::get($this->path(true), static::class)->name($this->route_name());
    }

    public function view()
    {
        return 'livewire.paginas.eventos.inscricoes.contato-component';
    }

    public function send()
    {
       sleep(3);
    }
}
