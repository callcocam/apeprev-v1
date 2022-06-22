<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associados\Includes\Traits;
use Illuminate\Support\Facades\Http;

/**
 * Instituicao
 */
trait TraitInstituicao
{
    public function getStatusProperty(){
       
      
       return $this->verifidStatus();
    }

    public function verifidStatus(){
       
      
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Token e57683d82d2e1e4e58461972090f85bf5abebb02',
            ])->withBody(json_encode($this->getDataBoleto()),'application/json')->post(config('boletos.recadastramento.onsulta','https://evento.apeprev.com.br/api/boleto/consultar/'));
         
            if($response->successful()){    
                if($response->json('status')){
                    if($response->json('Data do Pagamento')){
                        $this->model->instituicao_vigente()->update([
                            'status_id'=>status(\Str::slug($response->json('Situação do pagamento'))),
                            'payment_date'=>date_carbom_format($response->json('Data do Pagamento'))->format('Y-m-d'),
                        ]);
                        return true;
                    }
                    else{
                        $this->model->instituicao_vigente()->update([
                            'status_id'=>status(\Str::slug($response->json('Situação do pagamento')))
                        ]);
                    }
                }
                else{
                    $this->model->instituicao_vigente()->update([
                        'status_id'=>status(\Str::slug($response->json('Situação do pagamento')))
                    ]);
                }
            }           
            return false;
        } catch (\Exception $PDOException) {
          
            $this->notification()->error(
                $title = 'Error !!!',
                $description = $PDOException->getMessage()
            );
            return false;
        }
    }
    
    public function getDataBoleto(){
        return [
            "instituicao_id"=> data_get($this->data,'id',''),
            "razao_social"=> data_get($this->data,'name',''),
            "cnpj"=>data_get($this->data,'document',''),
            "cep"=>data_get($this->data,'address.zip',''),
            "endereco"=> data_get($this->data,'address.street',''),
            "bairro"=> data_get($this->data,'address.district',''),
            "cidade"=> data_get($this->data,'address.city',''),
            "uf"=> data_get($this->data,'address.state',''),            
            "valor"=> data_get($this->model,'instituicao_vigente.valor',''),            
            "obs"=> data_get($this->model,'instituicao_vigente.description',''),            
        ];
    }

    public function cancelarBoleto(){
        if($this->cancelarConfirm){
        $this->model->instituicao_vigente()->where('year',date('Y'))->delete();
        return redirect()->route('associados.acompanhar-filiacao');
        }
        $this->cancelarConfirm = true;
    }
}
