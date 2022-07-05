<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos\Inscricoes;

use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;

class ContatoComponent extends AbstractInscricaoComponent
{

    public $form_data = [];

    public function mount(Event $model)
    {
       $this->setFormProperties($model);
       if($user = auth()->user()){
         $this->form_data['name'] = auth()->user()->name;
         $this->form_data['email'] = auth()->user()->email;
         $this->form_data['event_id'] = $model->id;
         $this->form_data['message'] = '';
       }

    }

     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function route(){
       \Route::middleware(['web','auth:sanctum', 'verified'])->get($this->path(true), static::class)->name($this->route_name());
    }

    public function view()
    {
        return 'livewire.paginas.eventos.inscricoes.contato-component';
    }

    public function send()
    {
      $this->validate([
         'form_data.name' => 'required',
         'form_data.email' => 'required',
         'form_data.message' => 'required'
     ]);
      $users = \App\Models\User::whereHas('roles', function (Builder $query) {
         $query->where('slug', 'atendimento');
      })->get();
      if($users){
         foreach($users as $recebedor){
            $recebedor->notify(new \App\Notifications\EventoContatoNotification($recebedor,$this->model, $this->form_data));
         }
         data_set($this->form_data,'message','');
         $this->notification()->success(
            $title = 'Menssagem enviada com sucesso :)',
            $description = 'Assim que possivel entraremos em contato'
        );
      }
    }

    public function getAtendimentoProperty()
    {
       return \App\Models\User::whereHas('roles', function (Builder $query) {
         $query->where('slug', 'atendimento');
      })->get();
    }

    
    public function getFaqsProperty()
    {
       return \App\Models\Faq::where(published())->get();
    }
}
