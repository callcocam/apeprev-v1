<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Eventos\Inscricoes;
use App\Models\Event;

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
       return ['cloaseModal'];
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
            "participante.cpf" => ['required'],
            "participante.rg" => ['required'],
            "participante.office_id" => ['required'],
            "participante.birth_date" => ['required'],
            "participante.email" => ['required'],
            "participante.ddd" => ['required'],
            "participante.phone" => ['required'],
            "participante.tipo_inscricao_id" => ['required'],
        ]);

        if(\App\Models\User::create){}
     }

    public function view()
    {
        return 'livewire.paginas.eventos.inscricoes.add-participante-component';
    }

    // public function getOfficesProperty()
    // {
    //     return  \App\Models\Office::all();
    // }
    public function updatedParticipanteOfficeId($value)
    {
        if($value == 'add'){
            $this->emit('openOfficeModal', true);
        }
    }

    public function cloaseModal($office)
    { 
        if($office){
            $this->offices->push(\App\Models\Office::find($office));
            $this->participante['office_id'] = "";
        }

    }
}
