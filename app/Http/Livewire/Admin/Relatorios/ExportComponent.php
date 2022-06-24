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

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;


class ExportComponent extends Component
{

    private const MYSQL  = 'mysql';
    private const PGSQL  = 'pgsql';
    private const SQLITE = 'sqlite';
    private const SQLSRV = 'sqlsrv';

    public $data = [];
    public $model;
    public $table;
    private $schema;
    public function mount(?Relatorio $model)
    {
        $this->model = $model;
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
        return [
           'tableTitle' => __('Instituições Associação'),
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

    public function getTableColumns($table)
    {
        return \DB::select(sprintf("select * from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA='%s' AND TABLE_NAME = '%s'",env('DB_DATABASE','regimepopriobra_prod'),strtolower($table)));
    }

      /*
    |--------------------------------------------------------------------------
    |  Features query
    |--------------------------------------------------------------------------
    | Inicia a consulta ao banco de dados
    |
    */
    protected function query(){
       
        if($this->table){     
            $class = \Str::replace('-', '\\', $this->table); 
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
    |  Features columns
    |--------------------------------------------------------------------------
    | Configuração das colunas da tabel o cards de exibição
    |
    */
    protected function columns(){
        $columns = [];
        if($this->table){     
            $class = \Str::replace('-', '\\', $this->table); 
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
         ->with('tables',$this->tables()->toArray())
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
