<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Eventos;

use App\Models\Event;
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

    public function getCreateProperty()
    {
        return 'admin.event.create';
    }
    /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */

    public function route(){
        Route::get('/eventos', static::class)->name('admin.events');
    }

    public function format_view(){
        return "admin.events";
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
           'tableTitle' => __('Events'),
       ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Features query
    |--------------------------------------------------------------------------
    | Inicia a consulta ao banco de dados
    |
    */
    protected function query(){
        return Event::query()->order();
    }

    
    protected function order()
    {
        return Event::query();
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
            Link::make('Edit')->route('admin.event.edit')->xs()->icon('pencil-alt')->primary(),
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
            Column::make('Name')->searchable()->sortable()->makeInputText('name'),
            Column::make('Status','status.name')->field('status_id')
            ->makeInputStatus(),
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
   
}
