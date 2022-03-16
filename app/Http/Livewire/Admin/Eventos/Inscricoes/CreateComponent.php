<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Eventos\Inscricoes;

use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Radio;
use Tall\Form\Fields\Select;
use Tall\Form\Fields\Toggle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class CreateComponent extends FormComponent
{
    use AuthorizesRequests;

    public $instituicao;

    /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota de criação de um novo cadastro
    |
    */
    public function route(){
        Route::get('/inscricoes/cadastrar', static::class)->name('admin.eventos.inscricoes.create');
    }
    
   /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount()
    {
        
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties(null);
        if($instituicao = auth()->user()->instituicao){
            $this->instituicao = $instituicao;
        }
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
           'formTitle' => __('Inscrições'),
           'formAction' => __('Eventos'),
           'wrapWithView' => false,
           'showDelete' => false,
       ];
    }

    public function success(){
        $this->setFormProperties(\App\Models\Event::find(data_get($this->data, 'id')));
        // $this->model->evento_inscricaos()->firstOrCreate([
        //     'instituicao_id'=>$this->instituicao->id,
        //     'event_id'=>$this->model->id,
        //     'vacina'=>data_get($this->data,'vacina'),
        //     'termos'=>data_get($this->data,'termos'),
        // ]);
        // if( $inscricoes = $this->model->inscricoes()->where('instituicao_id',$this->instituicao->id)->first()){
        //     $this->inscricoes = $inscricoes->toArray();
        // }
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
            Select::make('Selecione um evento','id')->lazy()->options(\App\Models\Event::query()->where('inscrevase', 1)->pluck('name','id')->toArray())->rules("required"),
            Toggle::make('ESTOU CIENTE QUE DEVEREI APRESENTAR COMPROVANTE DE VACINAÇÃO COVID-19 PARA ACESSO AO EVENTO','vacina')->rules('required'),
            Toggle::make($this->termos(),'termos')->rules(function($data){
                 if($data){
                     return "required";
                 }
            }, $this->model)->hideIf($this->model),
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
          return null;
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
        return route("admin.eventos.inscricoes.create");
    }

    
    protected function view(){
      return "livewire.admin.eventos.inscricoes.create-component";
    }

    
    protected function termos()
    {
       $model = $this->model;         
       $label = "";
       if($model){
            if ($model->policie):
                $label = \Str::of($label)->append(' PRIVACIDADE,');
            endif;
            if ($model->politica_inscricao):
                $label = \Str::of($label)->append(' INSCRIÇÃO,');
            endif;
            if ($model->politica_desistencia):
                $label = \Str::of($label)->append('  DESISTÊNCIA E DESCONTOS');
            endif;
            if ($label):
                $label = \Str::of($label)->prepend('CONCORDO COM AS POLÍTICAS DE ');
            endif;
            return (string)$label;
       }
       return "CONCORDO COM AS POLÍTICAS";
    }
}