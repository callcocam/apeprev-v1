<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associados\Includes;

use App\Http\Livewire\AbstractPaginaComponent;
use App\Models\Instituicao;

class ServidoresComponent extends AbstractPaginaComponent
{
    
    public function mount(Instituicao $model)
    {
        $this->setFormProperties($model->servidor);
    }

    public function save()
    {
        $this->validate([
            'data.ativos'=>'required',
            'data.aposentados'=>'required',
            'data.pensionistas'=>'required'
        ]);

        try {
            if($this->model->update($this->data)){
                $this->notification()->success(
                    $title = __('saved'),
                    $description = "Quantidade de Servidores Atualizado com sucesso :)"
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
        return 'livewire.paginas.associados.includes.servidores-component';
    }
}
