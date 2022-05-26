<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associados;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Instituicao;

class RecadastreSeComponent extends AbstractPaginaComponent
{

    
    public $data = [
        "document"  =>"",
        "phone"     =>null,
        "whatsapp"  =>null,
    ];

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
    }
  
    public function save()
    {
        if ($this->model->exists) {
            
            return ;
         }

         if ($model =$this->model->query()->create($this->data)) {
            $model->servidor()->create([]);
            $model->representante()->create([]);
            $model->address()->create([]);
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
            $model->servidor()->firstOrCreate([]);
            $model->representante()->firstOrCreate([]);
           // $representante->address()->firstOrCreate([]);
            $model->address()->firstOrCreate([]);
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

    public function view()
    {

        if($this->model && $this->model->exists)
           return 'livewire.paginas.associados.recadastre-se-component';

        return 'livewire.paginas.associados.associe-se-document-component';
        
    }
}
