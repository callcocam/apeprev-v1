<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associados\Includes;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Instituicao;

use Illuminate\Validation\Rule;

class RepresentanteComponent extends AbstractPaginaComponent
{
    
    public $data = [
        "data_nascimento"=>"",
        "document"=>"",
        "phone"=>"",
        "whatsapp"=>"",
    ];

    
    public function mount(Instituicao $model)
    {
        $this->setFormProperties($model->representante);
    }

    public function save()
    {

        $this->validate([
            'data.name'=>'required',
            'data.document'=>'required',
            'data.cargo'=>'required',
            'data.email'=>'required|email',
            'data.phone'=>'required',
            'data.whatsapp'=>'required',
            'data.accept'=>[
                'required',
                Rule::in(['1']),
            ],
            'data.authorize'=>[
                'required',
                Rule::in(['1']),
            ],
        ]);

        try {
            if($this->model->update($this->data)){
                $this->notification()->success(
                    $title = __('saved'),
                    $description = "Dados do Representante atualizados com sucesso:)"
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

    public function view()
    {
        return 'livewire.paginas.associados.includes.representante-component';
    }

}
