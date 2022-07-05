<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Relatorios\Traits;


use Exception;
use Illuminate\Bus\Batch;
use Illuminate\Database\Eloquent as Eloquent;
use Illuminate\Support as Support;
use App\Services\Spout\Types\{ExportToCsv, ExportToXLS};
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Throwable;

/**
 * @property ?Batch $exportBatch
 */
trait Exportable
{
    protected $medelReport;

    public array $exportOptions = [];

    /**
     * @throws Throwable
     */
    public function exportToXLS(bool $selected = false): BinaryFileResponse|bool
    {
        return $this->export(ExportToXLS::class, $selected);
    }

    /**
     * @throws Throwable
     */
    public function exportToCsv(bool $selected = false): BinaryFileResponse|bool
    {
        return $this->export(ExportToCsv::class, $selected);
    }

    /**
     * @throws Exception
     */
    public function prepareToExport(bool $selected = false): Eloquent\Collection|Support\Collection
    {
        $model = $this->query();
        /** @phpstan-ignore-next-line */
        $currentTable = $model->getModel()->getTable();

        $results = $model
            // ->when($inClause, function ($query, $inClause) {
            //     return $query->whereIn($this->primaryKey, $inClause);
            // })
            // ->orderBy($sortField, $this->sortDirection)
            ->get();

        return $results;
    }

    /**
     * @throws Exception | Throwable
     */
    private function export(string $exportableClass, bool $selected): BinaryFileResponse|bool
    {
        
        if (count($this->checkboxValues) === 0 && $selected) {
            return false;
        }
        
        if (!count($this->checkboxValues)) {
            return false;
        }

        $this->createColumns();
        /**
         * @var ExportToCsv|ExportToCsv $exportable
         */
        $exportable = new $exportableClass();

        $columns = $this->model->colunas->toArray();


        /** @var string $fileName */

        $fileName = data_get($this->model, 'slug');
        $exportable->fileName($fileName)
            ->setData($columns, $this->prepareToExport($selected));

        return $exportable->download([]);
    }

    
    public function createColumns($name = null){
        $model = $this->model;
        foreach($this->checkboxValues as $table=>$column) {       
            if(is_array($column)){
                foreach($column as $key => $item) { 
                    if($item === false) {        
                        if($coluna = $model->colunas()->where('name', $name)->first()){
                            $this->deleteColumn($key,$coluna->relacionamentos()); 
                            if(!$coluna->relacionamentos->count()){                        
                                $this->deleteColumn($name,$model->colunas());  
                            }  
                        }else{
                            $this->deleteColumn($name,$model->colunas());   
                        }
                    }        
                    else{
                        $columnName = \Str::title($table);
                        if($coluna = $this->createColumn($table, $columnName,$model->colunas())) {
                            $columnName = \Str::title($item);
                            $relacionamento = $this->createColumn($item, $columnName,$coluna->relacionamentos());
                            $cabecalho = $this->createCabecalho($relacionamento, $columnName);
                            $this->createAtributo($cabecalho);
                            $celula = $this->createCelula($relacionamento);
                            $this->createAtributo($celula);
                        }                        
                    }               
                };
            }
            else{
                if($column === false) {
                    $this->deleteColumn($table,$model->colunas());   
                }        
                else{
                    $columnName = \Str::title($column);
                    if($coluna = $this->createColumn($column, $columnName,$model->colunas())){
                        $cabecalho = $this->createCabecalho($coluna, $columnName);
                        $this->createAtributo($cabecalho);
                        $celula = $this->createCelula($coluna);
                        $this->createAtributo($celula);
                    }
                }
            }        
        };
    }

    private function createColumn($column,$columnName, $model){        
        return $model->firstOrCreate([
            "name"=>$column,
            "status_id"=>status(),
        ]);
    }
    
    private function createCabecalho($model, $columnName){        
        return $model->cabecalho()->firstOrCreate([
            'label'=>$columnName
        ]);
    }

    private function createCelula($model){        
        return $model->celula()->firstOrCreate([]);
    }

    private function createAtributo($model){        
        return $model->atributo()->firstOrCreate([]);
    }

    private function deleteColumn($column, $model){
        if($coluna = $model->where('name', $column)->first()){
            if($celula = $coluna->celula){
                if($atribute = $celula->atribute){
                    $atribute->delete();
                }
                $celula->delete();
            }
            if($cabecalho = $coluna->cabecalho){
                if($atribute = $cabecalho->atribute){
                    $atribute->delete();
                }
                $cabecalho->delete();
            }
            $coluna->delete();
        }
       
    }

    
    public function tables(){

        $ignore = [
            "Atributo",
            "Permission",
            "Role",
            "Cabecalho",
            "Celula",
            "Coluna",
            "Documento",
            "File",
            "Filtro",
            "Image",
            "Description",
            "Policy",
            "PoliticaDeDesistencia",
            "PoliticaDeInscricao",
            "Relacionamento",
            "Relatorio",
            "Status",
            "Pagina",
            "Page",
            "Detalhe"
        ];
        
        $tables = $this->getModels();
        // $tables = $this->schema->getTableNames();

        $collection = new \Illuminate\Database\Eloquent\Collection;

        foreach($tables as $table){
            $label = \Str::afterLast($table, '\\');
            if(!in_array($label, $ignore)){
                $collection->put($table,$label );
            }
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

    
    protected function getIgnoreTables(){

        return [
            "atributos",
            "cabecalhos",
            "celulas",
            "colunas",
            "descriptions",
            "failed_jobs",
            "lb_blocks",
            "lb_contents",
            "migrations",
            "newsletters",
            "orderings",
            "pages",
            "paginas",
            "password_resets",
            "permission_role",
            "permission_user",
            "permissions",
            "personal_access_tokens",
            "policies",
            "politica_de_desistencias",
            "politica_de_inscricaos",
            "relatorios",
            "role_user",
            "roles",
            "sessions",
            "statuses",
        ];
    }
}
