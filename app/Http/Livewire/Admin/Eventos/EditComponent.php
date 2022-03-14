<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Eventos;

use App\Models\Event;
use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Textarea;
use Tall\Form\Fields\Button;
use Tall\Form\Fields\Radio;
use Tall\Form\Fields\DatetimePicker;
use Tall\Form\Fields\Select;
use Tall\Form\Fields\Editor;
use Tall\Form\Fields\Upload;
use Tall\Form\Fields\Checkbox;
use Tall\Form\Fields\Divider;
use Tall\Form\Fields\Includes\Prepend;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditComponent extends FormComponent
{
 
    use AuthorizesRequests;
    /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota de edição de um cadastro
    |
    */
     public function route(){
        Route::get('/evento/{model}/edit', static::class)->name('admin.event.edit');
    }

    /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro selecionado
    |
    */
    public function mount(Event $model)
    {
      
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model);// $event from hereon, called $this->model
    }

   /*
    |--------------------------------------------------------------------------
    |  Features formAttr
    |--------------------------------------------------------------------------
    | Inicia as configurações basica do formulario
    |
    */
    protected function formAttr(): array
    {
        return [
           'formTitle' => __('Event'),
           'formAction' => __('Edit'),
           'wrapWithView' => false,
           'showDelete' => false,
       ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Features fields
    |--------------------------------------------------------------------------
    | Inicia a configuração do campos disponiveis no formulario
    |
    */
    protected function fields(): array
    {
        
        $query = \App\Models\EventosContato::query();
        if($contatosSearch = \Arr::get($this->checkboxSearch, 'contatos')){
            $query->where("name", "LIKE", "%{$contatosSearch}%");
        }

        data_set($this->data, 'policie.name','Politica de privacidade do evento');
        data_set($this->data, 'politica_inscricao.name','Politica de inscrição do evento');
        data_set($this->data, 'politica_desistencia.name','Politica de desistência do evento');
        return [
            Input::make('name')
            ->placeholder("Your name")->rules("required"),
            Select::make('Hotel','hotel_id')->span(6)->options(\App\Models\Hotel::query()->pluck('name','id')->toArray())->rules("required"),
            Select::make('Local','local_id')->span(6)->options(\App\Models\Local::query()->pluck('name','id')->toArray())->rules("required"),
            Upload::make('Cover', 'cover')->span(7)->placeholder("Select Your Image"),  
            Upload::make('Mobile', 'mobile')->span(5)->placeholder("Select Your Image"),  
            Textarea::make('Url', 'url')->placeholder("Your url"),     
            Input::make('Tem Palestras', 'tem_palestras')->placeholder("Tem Palestras"),     
            Divider::blank("Politicas")->hint('Preencha corretamente todos os campos'),
            Input::make('Politica de privacidade', 'policie.content')->placeholder("Politica de privacidade"),   
            Editor::make('Politica de inscrição', 'politica_inscricao.content')->placeholder("Politica de privacidade"),   
            Editor::make('Politica de desistencia', 'politica_desistencia.content')->placeholder("Politica de desistencia"),   
            Textarea::make('Preview', 'description.preview')->placeholder("Your Desc"),   
            Editor::make('Description', 'description.content')->placeholder("Your Desc"),   
            DatetimePicker::make('Publish Up','start')->placeholder("Your start date")->span(3),   
            DatetimePicker::make('Publish Down','end')->placeholder("Your end date")->span(3),
            Select::make('Abrir inscrições','inscrevase')->span(6)->options(['0'=>"NÃO",'1'=>'SIM'])->rules("required"),
            Divider::blank("Planos Eventos")->hint('Planos - Selecione os planos para o evento'),
            Checkbox::make('Contatos')->options($query->pluck("name",'id')->toArray()),
            Divider::blank("Planos Contatos")->hint('Planos - Selecione os contatos para o evento'),
            Checkbox::make('Planos')->options(\App\Models\EventoPlano::query()->pluck("name",'id')->toArray())->rules('required'),
            Radio::make('Status', 'status_id')->status()->lg()
        ];
    }
    
    /*
    |--------------------------------------------------------------------------
    |  Features goBack
    |--------------------------------------------------------------------------
    | Rota de retorno para a lista de dados
    |
    */    
    public function goBack()
    {       
        return route("admin.events");
    }
}
