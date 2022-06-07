<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associados\Includes;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Instituicao;
use App\Http\Livewire\Traits\WithZip;
use Illuminate\Support\Facades\Http;

class BoletoComponent extends AbstractPaginaComponent
{
    use WithZip;
  
    public $plan;
    public $servidores_count;
    protected $listeners = ['loadInstitution'];

    public function loadInstitution(){
        $this->servidores_count = $this->model->servidor->ativos + $this->model->servidor->aposentados + $this->model->servidor->pensionistas;
    }
    public function mount(Instituicao $model)
    {
    
        $this->setFormProperties($model);
        $this->servidores_count = $model->servidor->ativos + $model->servidor->aposentados + $model->servidor->pensionistas;
        $this->plan = \App\Models\InstituicoesPlano::query()
        ->where('min_insured','<=',$this->servidores_count)
        ->where('max_insured','>=',$this->servidores_count)
        ->first();

        $this->data= array_merge($this->data,[
            "instituicao_id"=> $this->model->id,
            "valor"=> $this->plan->valor,
            "obs"=> data_get($this->data,'obs',$this->plan->name),
            "razao_social"=> $this->model->name,
            "cnpj"=> $this->model->document,
            "cep"=> $this->model->address->zip,
            "endereco"=> $this->model->address->street,
            "bairro"=> $this->model->address->district,
            "cidade"=> $this->model->address->city,
            "uf"=> $this->model->address->state,
            "vencimento"=> '17112002'
        ]);
    }

    public $data = [
        'obs'=>''
    ];

    public function save()
    { 
        $data= $this->data;
        
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Token e57683d82d2e1e4e58461972090f85bf5abebb02',
            ])->withBody(json_encode([
                "instituicao_id"=> data_get($this->data,'instituicao_id',''),
                "valor"=> data_get($this->data,'valor',''),
                "obs"=> data_get($this->data,'obs',''),
                "razao_social"=> data_get($this->data,'razao_social',''),
                "cnpj"=>data_get($this->data,'cnpj',''),
                "cep"=>data_get($this->data,'cep',''),
                "endereco"=> data_get($this->data,'endereco',''),
                "bairro"=> data_get($this->data,'bairro',''),
                "cidade"=> data_get($this->data,'cidade',''),
                "uf"=> data_get($this->data,'uf',''),
                "vencimento"=> data_get($this->data,'vencimento','')
            ]),'application/json')->post('https://evento.apeprev.com.br/api/boleto/gerar/');

            if($response->successful()){
                $this->notification()->success(
                    $title = __('saved'),
                    $description = "Dados da Instituição atualizado com sucesso!!"
                );
                $this->model->instituicao_virgente()->create([
                    'instituicao_id'=>$this->model->id,
                    'link'=>$response->json('link'),
                    'year'=>date('Y'),
                    'created_at'=>date('Y-m-d'),
                    'updated_at'=>date('Y-m-d'),
                ]);
                return redirect()->route('associados.associe-se.finalizar', $this->model);
            }
            return true;
        } catch (\PDOException $PDOException) {
            $this->notification()->error(
                $title = 'Error !!!',
                $description = $PDOException->getMessage()
            );
            return false;
        }
    }

    public function cancelarBoleto(){
        $this->model->instituicao_virgente()->where('year',date('Y'))->delete();
        return redirect()->route('associados.associe-se.finalizar', $this->model);
    }

    public function getCountServidoresProperty(){
            return $this->servidores_count;
    }
    public function view()
    {
        return 'livewire.paginas.associados.includes.boleto-component';
    }
}
