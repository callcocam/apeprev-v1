<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Relatorios;

use Livewire\{Component, WithPagination};
use Illuminate\Support\Facades\Route;
use App\Models\Instituicao;
use Tall\Table\Fields\Column;
use Tall\Table\Fields\Action;
use Tall\Table\Fields\Link;
use Tall\Table\Fields\Delete;
use App\Models\Relatorio;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Radio;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Tall\Form\FormComponent;


class ExportComponent extends FormComponent
{


    public $colums = [];
    private $schema;
    public function mount(?Relatorio $model)
    {
        $this->setFormProperties($model);
    }

  
    /*
    |--------------------------------------------------------------------------
    |  Features tableAttr
    |--------------------------------------------------------------------------
    | Inicia as configurações basica do table
    |
    */
    protected function tableAttr(): array
    {
      if($this->model->exists){
        return [
            'tableTitle' => __(sprintf('Relatórios Editar - %s', $this->model->name)),
        ];
      }
      return [
        'tableTitle' => __('Relatórios Cadastrar'),
      ];
    }
    /*
    |--------------------------------------------------------------------------
    |  Features actions
    |--------------------------------------------------------------------------
    | Realacionado as ações de cada registro, como editar deletar e visualizar
    |
    */
    protected function actions(){

      
        return [];
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
            Radio::make('Status', 'status_id')->status()->lg()
        ];
    }
    
    public function getDelateAllHeader()
    {
        return  null;
    }
    
    public function generate()
    {
       
    }

    
    protected function headers(){

        return [
            Action::make('Gerar associação')
        ->dialog([
            'method'=>'generate'
        ])->icon('trash')
        ];
    }

    // public function getTableColumns($table)
    // {
    //     return \DB::select(sprintf("select * from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA='%s' AND TABLE_NAME = '%s'",env('DB_DATABASE','regimepopriobra_prod'),strtolower($table)));
    // }

      /*
    |--------------------------------------------------------------------------
    |  Features query
    |--------------------------------------------------------------------------
    | Inicia a consulta ao banco de dados
    |
    */
    protected function query(){
       
        if($this->model->exists){     
            $class = \Str::replace('-', '\\', $this->model->model); 
            if(class_exists($class))    
            {
                return app($class)->query();
            }
        }
        return null;
    }
    
    /*
    |--------------------------------------------------------------------------
    |  Features query
    |--------------------------------------------------------------------------
    | Inicia a consulta ao banco de dados
    |
    */
    public function models(){
        $builder = $this->query();
        if($builder) return $builder->get();
        return null;
    }


    /*
    |--------------------------------------------------------------------------
    |  Features columns
    |--------------------------------------------------------------------------
    | Configuração das colunas da tabel o cards de exibição
    |
    */
    protected function columns(){
        $columns = [];
        if($this->model->exists){     
            $class = \Str::replace('-', '\\', $this->model->model); 
            if(class_exists($class))    
            {
                $table = app($class)->getTable();
                if(empty($this->schema)){
                    $this->makeSchema();
                }
                $columns = \Schema::getColumnListing($table);
                $columns["parent"] = $this->generateForeignKeys($table);
            }
        }
        else{
            $this->reset(['data']);
        }

        return $columns;
    }
    public function render()
    {

        return view('livewire.admin.relatorios.exportar-component')
         ->with('tableAttr',$this->tableAttr())
         ->with('columns',$this->columns())
         ->with('models',$this->models())
        ->layout("layouts.admin");
    }

    /**
     * Generates foreign key migrations.
     *
    * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function generateForeignKeys($table): array
    {
        $data=[];
        $foreignKeys = $this->schema->getTableForeignKeys($table);
        if ($foreignKeys->isNotEmpty()) {
           foreach($foreignKeys as $foreignKey){
            $data[$foreignKey->getForeignTableName()] = \Schema::getColumnListing($foreignKey->getForeignTableName());
           }
        }
        return $data;
    }

     /**
     * Get DB schema by the database connection name.
     *
    * @throws \Exception
     */
    protected function makeSchema(): void
    {
        $driver = \DB::getDriverName();

        if (!$driver) {
            throw new Exception('Failed to find database driver.');
        }

        switch ($driver) {
             case \App\Schema\Enum\Driver::MYSQL()->getValue():
                $this->schema = app(\App\Schema\MySQLSchema::class);
                break;
            default:
                throw new \Exception('The database driver in use is not supported.');
        }
    }
}
