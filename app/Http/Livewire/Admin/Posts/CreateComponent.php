<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Posts;

use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;

use App\Models\Post;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Textarea;
use Tall\Form\Fields\Button;
use Tall\Form\Fields\Radio;
use Tall\Form\Fields\DatetimePicker;
use Tall\Form\Fields\Select;
use Tall\Form\Fields\Editor;
use Tall\Form\Fields\Upload;
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
        Route::get('/post/create', static::class)->name('admin.post.create');
    }
    
    /*
    |--------------------------------------------------------------------------
    |  Features format_view
    |--------------------------------------------------------------------------
    | Inicia as configurações basica do de nomes e rotas
    |
    */
    public function format_view(){
        return "admin.post.create";
     }
   /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount(?Post $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model); // $model from hereon, called $this->model
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
           'formTitle' => __('Post'),
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
            Input::make('name')
            ->placeholder("Your name")->rules("required"),
            Upload::make('Cover', 'cover')->placeholder("Select Your Image"),   
            Textarea::make('Preview', 'description.preview')->placeholder("Your Desc"),   
            Editor::make('Description', 'description.content')->placeholder("Your Desc"),   
            DatetimePicker::make('Publish Up','start_date')->placeholder("Your start date")->span(3),   
            DatetimePicker::make('Publish Down','end_date')->placeholder("Your end date")->span(3),
            Radio::make('Type')->options(['post','noticy'])->span(3),
            Radio::make('Status', 'status_id')->status()->lg(),
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
          return redirect()->route("admin.post.edit", $this->model);
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
        return route("admin.posts");
    }
}
