<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Eventos\Contato;

use App\Models\EventosContato;
use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Radio;
use Tall\Form\Fields\Upload;
use Tall\Form\Fields\Select;
use Tall\Form\Fields\Textarea;


class CreateComponent extends FormComponent
{

    /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota de criação de um novo cadastro
    |
    */
    public function route(){
        Route::get('/eventos-contato/cadastro', static::class)->name('admin.eventos-contato.create');
    }
    
   /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount(?EventosContato $model)
    {
        //Gate::authorize()
        $this->setFormProperties($model); // $eventos-contato from hereon, called $this->model
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
           'formTitle' => __('EventosContato'),
           'formAction' => __('Create'),
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
        return [
            Input::make('Name')->rules('required'),
            Input::make('Link')->span(6),
            Select::make('Icone')->value_options(\App\Helpers\LoadRouterHelper::icons())->span(6),
            Textarea::make('Informações', 'description.content')->placeholder('Descreva as informação para o contato'),
            Radio::make('Status', 'status_id')->status()->lg()
        ];
    }
    
    /*
    |--------------------------------------------------------------------------
    |  Features saveAndGoBackResponse
    |--------------------------------------------------------------------------
    | Rota de redirecionamento apos a criação bem sucedida de um novo registro
    |
    */
     /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAndGoBackResponse()
    {
          return redirect()->route("admin.eventos-contato.edit", $this->model);
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
        return route("admin.eventos-contatos");
    }
}
