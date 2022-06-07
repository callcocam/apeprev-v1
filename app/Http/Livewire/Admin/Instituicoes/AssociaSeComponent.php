<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Instituicoes;

use Tall\Table\TableComponent;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Instituicao;
use Tall\Table\Fields\Column;
use Tall\Table\Fields\Action;
use Tall\Table\Fields\Link;
use Tall\Table\Fields\Delete;

class AssociaSeComponent extends TableComponent
{
    use AuthorizesRequests;

    public function mount()
    {
       $this->authorize(Route::currentRouteName());
    }

     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function route(){
       \Route::get("/instituicaos/associacao", static::class)->name('admin.instituicaos.associa-se');
    }

    /*
    |--------------------------------------------------------------------------
    |  Features query
    |--------------------------------------------------------------------------
    | Inicia a consulta ao banco de dados
    |
    */
    protected function query(){
       
        if($tipo = \App\Models\InstituicaoTipo::query()->where('slug','associado')->first())
        {
            return Instituicao::query()->where('instituicao_tipo_id', $tipo->id);
        }
       
        return Instituicao::query();
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
           'tableTitle' => __('Instituicaos Associação'),
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
        $results = 0;
        foreach(\Arr::get($this->checkboxValues, $this->page, []) as $value){
           if($value){
            $results++;
           }
        }
        if( $results){
            $this->clearFilters();            
            $this->notification()->success(
                $title = __('Deleted'),
                $description = $this->successDelete(null)
            );
        }        
    }

    
    protected function headers(){

        return [
            Action::make('Gerar associação')
        ->dialog([
            'method'=>'generate'
        ])->icon('trash')
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Features columns
    |--------------------------------------------------------------------------
    | Configuração das colunas da tabel o cards de exibição
    |
    */
    protected function columns(){
        return [
            Column::make('Name')->searchable()->sortable()->makeInputText('name'),
           
        ];
    }
    // public function view()
    // {
    //     return 'livewire.admin.instituicoes.associa-se-component';
    // }
}
