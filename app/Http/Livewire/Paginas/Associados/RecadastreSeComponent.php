<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associados;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Instituicao;
use Illuminate\Support\Facades\Http;

class RecadastreSeComponent extends AbstractPaginaComponent
{

    
    public $data = [
        "document"  =>"",
        "phone"     =>null,
        "whatsapp"  =>null,
    ];

    public $servidores_count;

    protected $listeners = ['loadInstitution'];

    public function loadInstitution(){
        if($model= $this->model){
            if($servidor= $model->servidor){
                $this->servidores_count = $servidor->ativos + $servidor->aposentados + $servidor->pensionistas;
            }else{
                $model->servidor()->create([]);
                return redirect()->route('associados.associe-se.finalizar', $model);
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
     
       \Route::get($this->path(), static::class)->name('associados.recadastre-se');
       \Route::get($this->path(true), static::class)->name('associados.associe-se.finalizar');
    }


    public function mount(?Instituicao $model)
    {
           
        $this->model = $model;
        if($model->exists){
            if($servidor = $model->servidor){
                $this->servidores_count = $model->servidor->ativos + $model->servidor->aposentados + $model->servidor->pensionistas;
            }
        }
        else{
            if($user = auth()->user()){
                return redirect()->route('associados.associe-se.finalizar', $user->instituicao);
            }
        }
    }
  
    public function save()
    {
        if ($this->model->exists) {
            
            return ;
         }

         $this->data['status_id'] = data_get(draft(),'status_id');
         if ($model =$this->model->query()->create($this->data)) {
            $model->servidor()->create(draft());
            $model->representante()->create(draft());
            $model->address()->create(draft());
            return redirect()->route('associados.associe-se.finalizar', $model);
         }
    }


    public function cancel()
    {
        return redirect()->route('associados.associe-se');
    }
    public function validarDocument()
    {
    
        $this->validate([
            'data.document'=>'required'
        ]);

       

        if ($model =$this->model->query()->where('document',$this->data['document'])->first()) {
        //     $model->servidor()->firstOrCreate(draft());
        //     $model->representante()->firstOrCreate(draft());
        //    // $representante->address()->firstOrCreate([]);
        //     $model->address()->firstOrCreate(draft());
            return redirect()->route('associados.associe-se.finalizar', $model);
        }
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

    /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function route_name($sufix=null){
       return 'associados.recadastre-se';
     }
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function order(){
        return 1000;
     }
    /*
    |--------------------------------------------------------------------------
    |  Features label
    |--------------------------------------------------------------------------
    | Label visivel no me menu
    |
    */
    public function label(){
        return 'Associe-se';
     }

    public function view()
    {

        if($this->model && $this->model->exists)
           return 'livewire.paginas.associados.recadastre-se-component';

        return 'livewire.paginas.associados.associe-se-document-component';
        
    }
}
