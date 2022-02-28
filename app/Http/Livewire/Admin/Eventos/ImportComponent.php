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
use Tall\Form\Fields\File;
use Maatwebsite\Excel\HeadingRowImport;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ImportComponent extends FormComponent
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
        Route::get('/eventos/import', static::class)->name('admin.events.import');
    }

   /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount(?Event $model)
    {
        $this->authorize(Route::currentRouteName());
        //Gate::authorize()
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
           'formTitle' => __('Event'),
           'formAction' => __('Import'),
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
               File::make('XSLS/CSV', 'url')
        ];
    }

    protected function success(){

        $file = \Arr::get($this->data, 'files.url');
        $name = $file->storePubliclyAs("events/imports",$file->getClientOriginalName());
      // \Excel::import(new \App\Imports\EventsImport, $file );
        $this->dialog()->success(
        $title = 'Arqui importado com sucesso',
        $description = sprintf('Use o nome [ %s ], para ler ou baixar o arquivo', $name)
    );
       /// dd( (new HeadingRowImport)->toArray($name));
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
          return redirect()->route("admin.events");
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
