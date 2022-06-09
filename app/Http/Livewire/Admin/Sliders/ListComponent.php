<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slide;
use Illuminate\Support\Carbon;
use Tall\Table\TableComponent;
use Tall\Table\Fields\Column;
use Tall\Table\Fields\Action;
use Tall\Table\Fields\Link;
use Tall\Table\Fields\Delete;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

final class ListComponent extends TableComponent
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
        Route::get('/sliders', static::class)->name('admin.sliders');
    }

    
    /*
    |--------------------------------------------------------------------------
    |  Features format_view
    |--------------------------------------------------------------------------
    | Inicia as configurações basica do de nomes e rotas
    |
    */
    public function format_view(){
        return "admin.sliders";
     }

    public function getCreateProperty()
    {
        return 'admin.slider.create';
    }
     /*
    |--------------------------------------------------------------------------
    |  Features query
    |--------------------------------------------------------------------------
    | Inicia a consulta ao banco de dados
    |
    */
    protected function query(){
        return Slide::query()->order();
    }
    
    
    protected function order()
    {
        return Slide::query();
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
           'tableTitle' => __('Sliders'),
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

        return [
            Link::make('Edit')->route('admin.slider.edit')->xs()->icon('pencil-alt')->primary(),
            Delete::make('Delete')->xs()->icon('trash')->negative(),
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
           Column::make('Name')->searchable()->livewire()->sortable()->makeInputText('name'),
           Column::make('Status','status.name')->field('status_id')
            ->makeInputStatus()
            ->status(),
            Column::make('Created At')->format(function($model, $column){
                return $model->created_at->format('d/m/Y');
            })
            ->field('created_at_formatted')
            ->makeInputDatePicker('created_at'),
        ];
    }
    
    /*
    |--------------------------------------------------------------------------
    |  Features headers
    |--------------------------------------------------------------------------
    | Configuração de ações adicionais, no topo de cada listagen,
    | por padrão ja tem o Deletar registros selecionados e expotar para exel (csv, xlsx)
    |
    */
    protected function headers(){

        return [
            // Action::make('Help Center')->separator(),    
        ];
    }

    public function updateOrder($data=[]){
        if($data){
             foreach($data as $item){               
                 if($model = $this->query()->find(data_get($item, 'value')) ){
                    if($ordering =$model->ordering ){
                        $ordering->order = data_get($item, 'order');
                        $ordering->update();
                    } else {
                        $model->ordering()->create([
                            'order'=>data_get($item, 'order')
                        ]);
                    }
                 }
             }
        }
     }
     
}
