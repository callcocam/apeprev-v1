<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos\Inscricoes;
use Illuminate\Validation\Rule;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Notification;

class IniciarComponent extends AbstractInscricaoComponent
{

    public $cartModal;
    public $instituicao;
    public $inscricoes = ['document'=>'','vacina'=>0,'termos'=>0, 'office_id'=>'','instituicao_id'=>''];

    protected $messages = [
        'inscricoes.instituicao_id.required' => 'Selecione uma instituição.',
        'inscricoes.office_id.required' => 'Selecione um cargo.',
        'inscricoes.document.required' => 'Digite um documento valido.',
        'inscricoes.vacina.required' => 'Concordar com o comprovante de vacina por favor.',
        'inscricoes.vacina.in' => 'Concordar com o comprovante de vacina por favor.',
        'inscricoes.termos.required' => 'Concordar com o termos e politica de privacidade.',
        'inscricoes.termos.in' => 'Concordar com o termos e politica de privacidade.',
    ];

    protected function getListeners()
    {
        return ['onClose'];
    }
     
   public function mount(Event $model)
   {
     parent::mount($model);
     if($user = auth()->user()){
        if($instituicao = $user->instituicao){
            $this->instituicao = $instituicao;         
            data_set( $this->inscricoes, 'document',$instituicao->document);
            if( $inscricoes = $model->inscricoes()->where('instituicao_id',$instituicao->id)->first()){
                $this->inscricoes = $inscricoes->toArray();
            }
        }
     }
   }

     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function route(){
     //  \Route::middleware(['web','auth:sanctum', 'verified'])->get($this->path(true), static::class)->name($this->route_name());
       \Route::get($this->path(true), static::class)->name($this->route_name());
    }
   
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function send(){
       if(data_get($this->inscricoes,'id')){
           return redirect()->route('eventos.inscricoes.inscricao', ['model'=>$this->model]);
       }
        $this->inscricoes['office_id'] = auth()->user()->office_id;
        $this->inscricoes['instituicao_id'] = auth()->user()->instituicao_id;
        $this->validate([
            'inscricoes.document' => 'required',
            'inscricoes.vacina' => [
                'required',
                Rule::in(['1']),
            ],
            'inscricoes.termos' =>  [
                'required',
                Rule::in(['1']),
            ],
        ]);

        if($model = \App\Models\Instituicao::query()->where('document', data_get($this->inscricoes,'document'))->first()){
            $this->cartModal = $model->evento_inscricaos()->firstOrCreate([
                'instituicao_id'=>$model->id,
                'event_id'=>$this->model->id,
                'vacina'=>data_get($this->inscricoes,'vacina'),
                'termos'=>data_get($this->inscricoes,'termos'),
            ]);
            if($this->cartModal){
                return redirect()->route('eventos.inscricoes.inscricao', ['model'=>$this->model]);
            }
        }
        else{
        $this->dialog()->confirm([
            'title'       => 'Tem certeza?',
            'description' => 'O CNPJ informado não consta em nossa base de dados de filiados para o corrente ano. Deseja iniciar o processo de filiação com a Apeprev para o ano corrente?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Sim, Iniciar processo de Filiação!',
                'method' => 'save'
            ],
            'reject' => [
                'label'  => 'Não, eu quero cancelar',
                'method' => 'cancel',
            ],
        ]);
        }
     }


     public function getLabelProperty()
     {
        $model = $this->model;         
        $label = "";
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
        return $label;
     }

    public function view()
    {
        return 'livewire.paginas.eventos.inscricoes.iniciar-component';
    }

    public function cancel()
    {
        $this->reset(['document','vacina','termos']);
    }

    public function save()
    {
       if ($model = \App\Models\Instituicao::query()->create([
           'name'=>\Str::of($this->document)->prepend('NONO CADASTRO '),
           'document'=>$this->document,
           "phone"     =>null,
           "whatsapp"  =>null,
       ])) {
            $model->servidor()->create([]);
            $model->representante()->create([]);
            $model->address()->create([]);
            return redirect()->route('associados.associe-se.finalizar', $model);
        }
    }

    public function associaSe()
    {
        $this->validate([
            'inscricoes.instituicao_id' => 'required',
            'inscricoes.office_id' => 'required'
        ]);
     
       if ($solicitante =  auth()->user()) {
            $solicitante->office_id = data_get($this->inscricoes, 'office_id');
            $solicitante->instituicao_id = data_get($this->inscricoes, 'instituicao_id');
            $solicitante->save();
            if(config('notifications.solicitar-afiliacao-usuario')){
                $users = \App\Models\User::whereHas('roles', function (Builder $query) {
                    $query->where('slug', 'fazer-inscricoes');
                })->where('instituicao_id',data_get($this->inscricoes, 'instituicao_id'))->get();
                if($users){
                    foreach($users as $recebedor){
                        Notification::send($recebedor,new \App\Notifications\SolicitarAfiliacaoNotification($solicitante, $recebedor));
                    }
                }
            }
           return $this->onClose();
        }
    }

    public function onClose()
    {
        return redirect()->route('eventos.inscricoes.apresentacao', $this->model);
    }

}
