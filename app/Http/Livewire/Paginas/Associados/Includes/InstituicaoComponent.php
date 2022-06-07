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

class InstituicaoComponent extends AbstractPaginaComponent
{
    use WithZip;
  
    public function mount(Instituicao $model)
    {
    
        $this->setFormProperties($model);
       
    
    }

    public $data = [
        "document"=>null,
        "phone"=>null,
        "whatsapp"=>null,
    ];

    public function save()
    { 
        $this->validate([
            'data.name'=>'required',
            'data.document'=>'required',
            'data.fantasy_name'=>'required',
            'data.email'=>'required|email',
            'data.address.zip'=>'required',
            'data.address.state'=>'required|max:2',
            'data.address.city'=>'required',
            'data.address.street'=>'required',
            'data.address.number'=>'required',
            'data.address.district'=>'required',
        ]);
       
        try {
           
            $this->data['slug'] = \Str::slug($this->data['name']);
            $this->data['status_id'] = data_get(published(),'status_id');
            if($this->model->update($this->data)){
                if($address = \Arr::get($this->data, 'address')){
                    $this->model->address()->update([
                        "name" => $this->model->name,
                        "slug" => \Str::slug($this->model->name),
                        "id" => \Arr::get($address, 'id'),
                        "zip" => \Arr::get($address, 'zip'),
                        "state" =>  \Arr::get($address, 'state'),
                        "city" =>  \Arr::get($address, 'city'),
                        "street" =>  \Arr::get($address, 'street'),
                        "district" =>  \Arr::get($address, 'district'),
                        "number" => \Arr::get($address, 'number'),
                        "complement" =>  \Arr::get($address, 'complement'),
                        "country" =>  \Arr::get($address, 'country'),
                    ]);
                }
                $this->notification()->success(
                    $title = __('saved'),
                    $description = "Dados da Instituição atualizado com sucesso!!"
                );
                $this->emit('loadInstitution');
                return true;
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

    public function updatedDataAddressZip($value)
    {
        $this->zip($value);
    }
    public function view()
    {
        return 'livewire.paginas.associados.includes.instituicao-component';
    }
}
