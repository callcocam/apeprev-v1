<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Relatorios\Includes;


use App\Models\Relatorio;
use Tall\Form\FormComponent;
use App\Http\Livewire\Admin\Relatorios\Traits\Exportable;

class ColumnsComponent extends FormComponent
{
    use Exportable;
    
    public $cardModal;
    public $updated = false;
    private $schema;
    private $remover;

    public $checkboxValues = [];
    public $ignoreColumns = ["two_factor_recovery_codes",'two_factor_secret','remember_token','email_verified_at'];

      /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro selecionado
    |
    */
    public function mount(?Relatorio $model)
    {
        
        $this->setFormProperties($model); 
        if($colunas = $model->colunas){
            if($colunas->count()){
                foreach($colunas as $name => $column){
                   if($column->relacionamentos->count()){                        
                        if($relacionamentos = $column->relacionamentos){                        
                            foreach($relacionamentos as $relacionamento){
                                data_set($this->checkboxValues,sprintf("%s.%s", $column->name, $relacionamento->name),$relacionamento->name);
                            }
                        }
                   }
                   else{
                    data_set($this->checkboxValues, $column->name,$column->name);
                   }
                }
            }
        }
    }
   
      /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function openModal(){
        $this->cardModal = true;            
     }

      /*
    |--------------------------------------------------------------------------
    |  Features columns
    |--------------------------------------------------------------------------
    | Configuração das colunas da tabel o cards de exibição
    |
    */
    public function getColumnsProperty(){
        $columns = [];
       
        if($this->model->exists){     
            $class = \Str::replace('-', '\\', $this->model->model); 
            if(class_exists($class))    
            {
                $table = app($class)->getTable();
                if(empty($this->schema)){
                    $this->makeSchema();
                }
                //dd($this->schema->getTableNames());
                $columns = \Schema::getColumnListing($table);
                $columns["parent"] = $this->generateForeignKeys($table);
            }
        }
        else{
            $this->reset(['data']);
        }

        return $columns;
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
            $name = $foreignKey->getForeignTableName();
                if(!in_array($name, $this->getIgnoreTables())){
                    $data[$name] = \Schema::getColumnListing($name);
                }
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


    public function updatedCheckboxValues($value){
        $this->createColumns($this->remover);
        $this->updated = true;
      }

    public function updatingCheckboxValues($value, $key){
        if(\Str::of($key)->contains('.')){
            $this->remover = \Str::beforeLast($key, '.');
        }
      }

      /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function closeModal(){
        if($this->updated)
            return redirect()->route('admin.relatorio.gerenciar', $this->model);         
     }

    public function view()
    {
        return 'livewire.admin.relatorios.includes.columns-component';
    }
}
