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
  
    public function mount(Instituicao $model)
    {
    
        $this->setFormProperties($model);
    
    }

    public $data = [];

    public function save()
    { 
              
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Token e57683d82d2e1e4e58461972090f85bf5abebb02'
            ])->post('https://evento.apeprev.com.br/api/boleto', $this->data);
            if($response->successful()){
                $this->notification()->success(
                    $title = __('saved'),
                    $description = "Dados da Instituição atualizado com sucesso!!"
                );
                dd($response->object());
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
    public function view()
    {
        return 'livewire.paginas.associados.includes.boleto-component';
    }
}
