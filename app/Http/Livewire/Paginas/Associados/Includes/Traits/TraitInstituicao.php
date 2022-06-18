<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associados\Includes\Traits;

/**
 * Instituicao
 */
trait TraitInstituicao
{
    public function getStatusProperty(){
              
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Token e57683d82d2e1e4e58461972090f85bf5abebb02',
            ])->withBody(json_encode($this->getDataBoleto()),'application/json')->get(config('boletos.recadastramento.consulta','https://evento.apeprev.com.br/api/boleto/gerar/'));

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
        } catch (\PDOException $PDOException) {
            $this->notification()->error(
                $title = 'Error !!!',
                $description = $PDOException->getMessage()
            );
            return false;
        }
    }
    
    public function getDataBoleto(){
        return [
            "instituicao_id"=> data_get($this->data,'instituicao_id',''),
            "razao_social"=> data_get($this->data,'razao_social',''),
            "cnpj"=>data_get($this->data,'cnpj',''),
            "cep"=>data_get($this->data,'cep',''),
            "endereco"=> data_get($this->data,'endereco',''),
            "bairro"=> data_get($this->data,'bairro',''),
            "cidade"=> data_get($this->data,'cidade',''),
            "uf"=> data_get($this->data,'uf',''),            
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
