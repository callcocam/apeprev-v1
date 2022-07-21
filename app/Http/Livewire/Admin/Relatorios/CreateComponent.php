<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Relatorios;

use App\Models\Relatorio;
use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Select;
use Tall\Form\Fields\Radio;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;


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
        Route::get('/relatorio/create', static::class)->name('admin.relatorio.create');
    }
    
    /*
    |--------------------------------------------------------------------------
    |  Features format_view
    |--------------------------------------------------------------------------
    | Inicia as configurações basica do de nomes e rotas
    |
    */
    public function format_view(){
        return "admin.relatorio.create";
     }
     
   /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount(?Relatorio $model)
    {
        $this->authorize(Route::currentRouteName());
        
        $this->setFormProperties($model); // $relatorio from hereon, called $this->model
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
           'formTitle' => __('Relatorio'),
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
            Input::make('Nome do relatório', 'name')->span(5)->rules('required'),
            Select::make('Modelo','model')->span(7)->options($this->tables())->rules('required'),
            Radio::make('Status', 'status_id')->status()->lg()
        ];
    }
    
    
    public function tables(){

        
        $tables = $this->getModels();
        // $tables = $this->schema->getTableNames();

        $collection = new \Illuminate\Database\Eloquent\Collection;

        foreach($tables as $table){
            $collection->put(\Str::replace('\\', '-', $table), \Str::afterLast($table, '\\'));
        }

        return $collection; //or compact('collection'); //for combo select
    }

    protected function getModels(): Collection
    {
        $models = collect(File::allFiles(app_path()))
            ->map(function ($item) {
                $path = $item->getRelativePathName();
                $class = sprintf('\\%s%s', Container::getInstance()->getNamespace(), strtr(substr($path, 0, strrpos($path, '.')), '/', '\\'));
    
                return $class;
            })
            ->filter(function ($class) {
                $valid = false;
    
                if (class_exists($class)) {
                    $reflection = new \ReflectionClass($class);
                    $valid = $reflection->isSubclassOf(Model::class) &&
                        !$reflection->isAbstract();
                }
    
                return $valid;
            });
        return $models->values();
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
          return redirect()->route("admin.relatorio.edit", $this->model);
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
        return route("admin.relatorios");
    }

    // public function view()
    // {
    //     return 'livewire.admin.relatorios.create-component';
    // }
}
