<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Eventos\Local;

use App\Models\Local;
use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Radio;
use Tall\Form\Fields\Divider;
use Tall\Form\Fields\Textarea;
use Tall\Form\Fields\Upload;
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
        Route::get('/local/{model}/edit', static::class)->name('admin.local.edit');
    }
    
    /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro selecionado
    |
    */
    public function mount(?Local $model)
    {
       
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model); // $local from hereon, called $this->model
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
           'formTitle' => __('Local'),
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
        return [
            Input::make('Name')->rules('required'),
            Upload::make('Cover', 'cover')->placeholder("Select Your Image"),  
            Divider::blank("Dados do local")->hint('Preencha corretamente todos os campos'),
            Input::make('Postal code','address.zip')->span(3)->rules('required')->placeholder('Postal code'),
            Input::make('State','address.state')->span(3)->rules('required|max:2')->placeholder('State'),
            Input::make('City','address.city')->span(6)->rules('required')->placeholder('City'),
            Input::make('Street','address.street')->span(8)->rules('required')->placeholder('Street'),
            Input::make('District','address.district')->span(4)->rules('required')->placeholder('District'),
            Input::make('Number','address.number')->rules('required')->placeholder('Number'),
            Input::make('Complement','address.complement')->span(7)->placeholder('Complement'),
            Input::make('Country','address.country')->span(5)->placeholder('Country'),
            Textarea::make('Observations', 'description.preview')
            ->field('description_preview')->placeholder('Observations'),
            Textarea::make('Como chegar', 'description.content')->placeholder('Compartilhar a localização'),
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
          return redirect()->route("admin.locals");
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
        return route("admin.locals");
    }
}
