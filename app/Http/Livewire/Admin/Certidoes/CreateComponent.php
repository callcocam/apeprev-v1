<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Certidoes;

use App\Models\Certidao;
use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\File;
use Tall\Form\Fields\Radio;
use Tall\Form\Fields\DatetimePicker;
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
        Route::get('/certidao/create', static::class)->name('admin.certidao.create');
    }
    /*
    |--------------------------------------------------------------------------
    |  Features format_view
    |--------------------------------------------------------------------------
    | Inicia as configurações basica do de nomes e rotas
    |
    */
    public function format_view(){
        return "admin.certidao.create";
     }
     
   /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount(?Certidao $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model); // $certidao from hereon, called $this->model
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
           'formTitle' => __('Certidao'),
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
            Input::make('Name')->span("9")->rules('required'),
            Input::make('Ordem','ordering')->span("3"),
            DatetimePicker::make('Data emissão','data_emissao')->span("6")->rules('required'),
            DatetimePicker::make('Data validade','data_validade')->span("6"),
            File::make('Arquivo','url'),
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
          return redirect()->route("admin.certidao.edit", $this->model);
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
        return route("admin.certidaos");
    }
}
