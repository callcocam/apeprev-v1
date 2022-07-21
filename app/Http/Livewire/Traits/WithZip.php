<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace App\Http\Livewire\Traits;


/**
 * WithPages
 */
trait WithZip
{
    protected function zip($value)
    {
        if(empty($value)){
            \Arr::set($this->data, 'address.street',"");
            \Arr::set($this->data, 'address.complement',"");
            \Arr::set($this->data, 'address.district',"");
            \Arr::set($this->data, 'address.state',"");
            \Arr::set($this->data, 'address.city',"");
            \Arr::set($this->data, 'address.siafi',"");
            \Arr::set($this->data, 'address.ddd',"");
            \Arr::set($this->data, 'address.ibge',"");
            \Arr::set($this->data, 'address.gia',"");
            return;
        }
        try {
            $cepResponse = cep($value);
            $data = $cepResponse->getCepModel();
            if($data){
                \Arr::set($this->data, 'address.street',$data->logradouro);
                \Arr::set($this->data, 'address.complement',$data->complemento);
                \Arr::set($this->data, 'address.district',$data->bairro);
                \Arr::set($this->data, 'address.state',$data->uf);
                \Arr::set($this->data, 'address.city',$data->localidade);
                \Arr::set($this->data, 'address.siafi',$data->siafi);
                \Arr::set($this->data, 'address.ddd',$data->ddd);
                \Arr::set($this->data, 'address.ibge',$data->ibge);
                \Arr::set($this->data, 'address.gia',$data->gia);
                return;
            }      
        } catch (\Throwable $th) {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = $th->getMessage()
            );
        }
    }
}