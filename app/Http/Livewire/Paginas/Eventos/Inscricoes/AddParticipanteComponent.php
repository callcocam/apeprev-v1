<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos\Inscricoes;
use App\Models\Event;
use Illuminate\Validation\Rule;

class AddParticipanteComponent extends AbstractInscricaoComponent
{

    public $offices;
    public $inscricoes;
    public $instituicao;
    public $officeModal = false;

    public $participante = [
        'name'=>'',
        'cracha'=>'',
        'cpf'=>'',
        'rg'=>'',
        'office_id'=>'',
        'birth_date'=>'',
        'email'=>'',
        'ddd'=>'',
        'phone'=>'',
        'tipo_inscricao_id'=>'',
        'hotel'=>0,
    ];
       
    
    protected $messages = [
        'participante.name.required' => 'Digite o nome do participante.',
        'participante.cracha.required' => 'Campo é obrigatório.',
        'participante.cracha.max' => 'Campo deve ser menor que 12 caractéres.',
        'participante.cpf.required' => 'Campo é obrigatório.',
        'participante.cpf.unique' => 'Campo já existe.',
        'participante.email.unique' => 'Campo já existe.',
        'participante.rg.unique' => 'Campo já existe.',
        'participante.rg.required' => 'Campo é obrigatório.',
        'participante.office_id.required' => 'Selecione um opção.',
        'participante.birth_date.required' => 'Campo é obrigatório.',
        'participante.email.required' => 'Campo é obrigatório.',
        'participante.ddd.required' => 'Campo é obrigatório.',
        'participante.phone.required' => 'Campo é obrigatório.',
        'participante.tipo_inscricao_id.required' => 'Selecione um opção.',
    ];

    

   protected function getListeners()
   {
       return ['cloaseModal','edit'];
   }

   public function mount(Event $model)
   {
        parent::mount($model);
        if($instituicao = auth()->user()->instituicao){
            $this->instituicao = $instituicao;
            if( $inscricoes = $model->inscricoes()->where('instituicao_id',$instituicao->id)->first()){
                $this->inscricoes = $inscricoes->toArray();
            }
        }
        $this->offices = \App\Models\Office::all();
   }

    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function save(){
        $this->validate([
            "participante.name" => ['required'],
            "participante.cracha" => ['required','max:12'],
            "participante.cpf" => ['required', Rule::unique('users', 'cpf')->ignore(data_get($this->participante, 'id'))],
            "participante.rg" => ['required'],
            "participante.office_id" => ['required'],
            "participante.birth_date" => ['required'],
            "participante.email" => ['required', Rule::unique('users', 'email')->ignore(data_get($this->participante, 'id'))],
            "participante.ddd" => ['required'],
            "participante.phone" => ['required'],
            "participante.tipo_inscricao_id" => ['required'],
        ]);
        if(data_get($this->participante, 'id')){
            $this->instituicao->participantes()->where('id',data_get($this->participante, 'id'))->update([
                'name'=>data_get($this->participante, 'name'),
                'cracha'=>data_get($this->participante, 'cracha'),
                'cpf'=>data_get($this->participante, 'cpf'),
                'rg'=>data_get($this->participante, 'rg'),
                'office_id'=>data_get($this->participante, 'office_id'),
                'birth_date'=>date_carbom_format(data_get($this->participante, 'birth_date'))->format("Y-m-d"),
                'email'=>data_get($this->participante, 'email'),
                'ddd'=>data_get($this->participante, 'ddd'),
                'phone'=>data_get($this->participante, 'phone'),
                'tipo_inscricao_id'=>data_get($this->participante, 'tipo_inscricao_id')
            ]);
        }
        else{
            data_set($this->participante,'password',date("YmdHis"));
            if($participante = $this->instituicao->participantes()->create($this->participante)){
                  data_set( $this->participante ,'id', $participante->id);
            }
        }
     }

    public function view()
    {
        return 'livewire.paginas.eventos.inscricoes.add-participante-component';
    }

    public function updatedParticipanteOfficeId($value)
    {
        if($value == 'add'){
            $this->emit('openOfficeModal', true);
        }
    }

    public function edit($id)
    { 
        if($participante = \App\Models\User::find($id)){
            data_set( $this->participante ,'id', $participante->id);
            data_set( $this->participante ,'name', $participante->name);
            data_set( $this->participante ,'cracha', $participante->cracha);
            data_set( $this->participante ,'cpf', $participante->cpf);
            data_set( $this->participante ,'rg', $participante->rg);
            data_set( $this->participante ,'office_id', $participante->office_id);
            data_set( $this->participante ,'birth_date', $participante->birth_date);
            data_set( $this->participante ,'email', $participante->email);
            data_set( $this->participante ,'ddd', $participante->ddd);
            data_set( $this->participante ,'phone', $participante->phone);
            data_set( $this->participante ,'tipo_inscricao_id', $participante->tipo_inscricao_id);
        }

    }

    public function new()
    {
        $this->participante = [
            'name'=>'',
            'cracha'=>'',
            'cpf'=>'',
            'rg'=>'',
            'office_id'=>'',
            'birth_date'=>'',
            'email'=>'',
            'ddd'=>'',
            'phone'=>'',
            'tipo_inscricao_id'=>'',
            'hotel'=>0,
        ];
    }
    public function cloaseModal($office)
    { 
        if($office){
            $this->offices->push(\App\Models\Office::find($office));
            $this->participante['office_id'] = "";
        }

    }
}
