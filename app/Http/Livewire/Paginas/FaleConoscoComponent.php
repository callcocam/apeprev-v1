<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas;

use App\Http\Livewire\AbstractPaginaComponent;
use Illuminate\Support\Facades\Mail;

class FaleConoscoComponent extends AbstractPaginaComponent
{

    protected $rules = [
        'data.name' => 'required',
        'data.email' => 'required|email',
        'data.description' => 'required',
    ];

    protected $messages = [
        'data.name' => 'Por favor informe seu nome',
        'data.email' => 'Por favor informe um email valido',
        'data.description' => 'Por favor, o campo Menssagem deve ser preenchido',
    ];

    public function sendMail()
    {
        $this->validate();

        if(\App\Models\Newsletter::query()->firstOrCreate($this->data)){
            Mail::to(config('mail.from.address'))->send(new \App\Mail\ContatoMail($this->data));
            $this->reset(['data']);
            $this->dialog()->success(
                $title = 'E-Mail recebido com sucesso',
                $description = 'Recebemos o seu contato, muito em breve, entraremos em contato:)'
            );
            return true;
        }
        return false;
    }

    /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function route(){
       \Route::get($this->path(), static::class)->name($this->route_name());
    }
   
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function label(){
        return "ATENDIMENTO";
     }

    public function view()
    {
        return 'livewire.paginas.fale-conosco-component';
    }
}
