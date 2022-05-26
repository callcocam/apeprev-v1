<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Textarea;
use Tall\Form\Fields\Editor;
use Tall\Form\Fields\Radio;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class CreateComponent extends FormComponent
{
    
  use AuthorizesRequests;

    /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota de criação de um novo cadastro
    |
    */
    public function route(){
        Route::get('/page/create', static::class)->name('admin.page.create');
    }

    public function mount(?Page $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model); // $page from hereon, called $this->model
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
           'formTitle' =>__('Page'),
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
            Input::make('Name')->placeholder('Name')->span('6')->rules('required'),
            Input::make('url')->placeholder('/eventos')->span('3')->rules('required'),
            Textarea::make('Preview','description.preview')->placeholder('Preview')->rules('required'),
            Editor::make('Description','description.content')->hint('Somente preencher se desejar usar para exibição de conteudo')->rules('required'),
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
          return redirect()->route("admin.page.edit", $this->model);
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
        return route("admin.pages");
    }
}
