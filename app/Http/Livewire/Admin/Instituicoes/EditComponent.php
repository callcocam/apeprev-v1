<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Instituicoes;

use App\Models\Instituicao;
use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Divider;
use Tall\Form\Fields\Radio;
use Tall\Form\Fields\Select;
use Tall\Form\Fields\Toggle;
use Tall\Form\Fields\Checkbox;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditComponent extends FormComponent
{

    use AuthorizesRequests;
    /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota de edição de um cadastro
    |
    */
    public function route(){
        Route::get('/instituicao/{model}/edit', static::class)->name('admin.instituicao.edit');
    }
    
    
    // protected function view(){
    //     return "tall-forms::instituicao.edit";
    // }

    /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro selecionado
    |
    */
    public function mount(?Instituicao $model)
    {
        // dd($model->toArray());
        $this->authorize(Route::currentRouteName());

        //dd($model->instituicoes_plano);
        $this->setFormProperties($model); // $instituicao from hereon, called $this->model
    }
    // protected function submit(){
    //    dd($this->data);
    //         return parent::submit();
    // }
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
           'formTitle' => __('Instituicao'),
           'formAction' => __('Edit'),
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
        $query = \App\Models\TipoInscricao::query();
        if($tipo_inscricoesSearch = \Arr::get($this->checkboxSearch, 'tipo_inscricoes')){
            $query->where("name", "LIKE", "%{$tipo_inscricoesSearch}%");
        }

        return [
            Divider::blank("Dados da Instituição")->hint('Dados da Instituição - Preencha corretamente todos os campos'),
            Select::make('Tipo de associação','instituicao_tipo_id')->options(\App\Models\InstituicaoTipo::query()->pluck('name','id')->toArray())->rules('required'),
            Input::make('Razão Social (INSTITUTO/FUNDO/FUNDAÇÃO)','name')->rules('required'),
            Input::make('Nome Fantasia ','fantasy_name')->span(4)->rules('required'),
            Input::make('CNPJ','document')->span(4)->rules('required'),
            Input::make('Email da Instituição','email')->span(4)->rules('required'),
            Input::make('Codigo Postal','address.zip')->span(3)->rules('required'),
            Input::make('UF / Estado','address.state')->span(2)->rules('required'),
            Input::make('Cidade','address.city')->span(4)->rules('required'),
            Input::make('Bairro','address.district')->span(3)->rules('required'),
            Input::make('Endereço ** sem o número **','address.street')->span(6)->rules('required'),
            Input::make('Número','address.number')->span(2)->rules('required'),
            Input::make('Complemento','address.complement')->span(4),
            Divider::blank("Quantidade de Servidores")->hint('Quantidade de Servidores - Preencha corretamente todos os campos'),
            Input::make('Nº Ativos','servidor.ativos')->span(4)->rules('required'),
            Input::make('Nº Aposentados','servidor.aposentados')->span(4)->rules('required'),
            Input::make('Nº Pensionistas','servidor.pensionistas')->span(4)->rules('required'),
            Divider::blank("Dados do Representante")->hint('Dados do Representante - Preencha corretamente todos os campos'),
            Input::make('Nome do representante','representante.name')->span(4)->rules('required'),
            Input::make('CPF','representante.document')->span(4)->rules('required'),
            Input::make('Cargo','representante.cargo')->span(4)->rules('required'),
            Input::make('E-mail','representante.email')->span(4)->rules('required'),
            Input::make('Telefone (DDD) XXXX-XXXX','representante.phone')->span(4)->rules('required'),
            Input::make('WhatsApp (DDD) XXXX-XXXX','representante.whatsapp')->span(4)->rules('required'),
            Toggle::make('Autorizo a filiação do RPPS junto a Apeprev','representante.authorize')->span(6)->rules('required'),
            Toggle::make('Aceito o termo','representante.accept')->span(6)->rules('required'),
            Radio::make('Status', 'status_id')->status()->lg(),
            Divider::blank("Tipo iscrições")->hint('Tipo de iscrições - Selecione os campos abaixo'),
            Checkbox::make('Tipo de inscrições', 'tipo_inscricoes')->hint('Tipo de iscrições - Selecione os campos abaixo')->options($query->pluck("name",'id')->toArray()),
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
          return redirect()->route("admin.instituicaos");
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
        return route("admin.instituicaos");
    }
}
