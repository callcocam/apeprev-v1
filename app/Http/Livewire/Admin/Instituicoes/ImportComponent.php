<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Instituicoes;

use App\Models\Instituicao;
use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\File;
use Maatwebsite\Excel\HeadingRowImport;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ImportComponent extends FormComponent
{
    public $rows = [];

    use AuthorizesRequests;

    /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota de criação de um novo cadastro
    |
    */
    public function route(){
        Route::get('/instituicao/import', static::class)->name('admin.instituicao.import');
    }

   /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount(?Instituicao $model)
    {
        $this->authorize(Route::currentRouteName());
        //Gate::authorize()
        $this->setFormProperties($model); // $model from hereon, called $this->model
    }

   /*
    |--------------------------------------------------------------------------
    |  Features formAttr
    |--------------------------------------------------------------------------
    | Inicia as configurações basica do formulario
    |
    */
    protected function formAttr(): array
    {
        return [
           'formTitle' => __('Instituições'),
           'formAction' => __('Import'),
           'wrapWithView' => false,
           'showDelete' => false,
       ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Features fields
    |--------------------------------------------------------------------------
    | Inicia a configuração do campos disponiveis no formulario
    |
    */
    protected function fields(): array
    {
        return [
               File::make('XSLS/CSV', 'url')
        ];
    }

    protected function success(){

        $file = \Arr::get($this->data, 'files.url');
        $name = $file->storePubliclyAs("instituicao/imports",$file->getClientOriginalName());
      // \Excel::import(new \App\Imports\EventsImport, $file );
        $this->dialog()->success(
        $title = 'Arqui importado com sucesso',
        $description = sprintf('Use o nome [ %s ], para ler ou baixar o arquivo', $name)
    );
       /// dd( (new HeadingRowImport)->toArray($name));
       $this->rows['instituicaos']=[];
       if (\Storage::disk('public')->exists($name)) {
           $instituicaos=(new \App\Imports\InstituicoesImport)->toCollection($name);
           $instituicaos = $instituicaos[0];
           $headers = $instituicaos[1];
           unset($instituicaos[0],  $instituicaos[1]);
           $this->rows = $instituicaos->sortDesc()->toArray();
           foreach($this->rows as $row):
            if($model = $this->model->where('document', preg_replace("/\D+/", "", $row[0]))->first())
            {
                $model->update([
                    'name'=>$row[1],
                    'document'=>preg_replace("/\D+/", "", $row[0]),
                    'fantasy_name'=>$row[2],
                    'email'=>$row[11],
                ]);                
                if(!$model->address){
                    $model->address()->create([]);
                }
                $model->address()->update([
                    'zip'=>$row[5],
                    'state'=>$row[7],
                    'city'=>$row[6],
                    'street'=>$row[3],
                    'district'=>$row[4],
                ]);                
                if(!$model->representante){
                    $model->representante()->create([]);
                }
                $model->representante()->update([
                    'name'=>$row[9],
                    'document'=>$row[8],
                    'cargo'=>$row[10],
                    'email'=>$row[11],
                    'phone'=>sprintf("%s%s",$row[12],$row[13]),
                    'whatsapp'=>sprintf("%s%s",$row[14],$row[15]),
                ]);

            }else{
               $model =  Instituicao::query()->create([
                    'name'=>$row[1],
                    'document'=>preg_replace("/\D+/", "", $row[0]),
                    'fantasy_name'=>$row[2],
                    'email'=>$row[11],
                ]);
                $model->address()->create([
                    'zip'=>$row[5],
                    'state'=>$row[7],
                    'city'=>$row[6],
                    'street'=>$row[3],
                    'district'=>$row[4],
                ]);                
                $model->representante()->create([
                    'name'=>$row[9],
                    'document'=>$row[8],
                    'cargo'=>$row[10],
                    'email'=>$row[11],
                    'phone'=>sprintf("%s%s",$row[12],$row[13]),
                    'whatsapp'=>sprintf("%s%s",$row[14],$row[15]),
                ]);
            }
              
           endforeach;
       }
    }
    // 0 => "CNPJ"
    // 1 => "Instituicao"
    // 2 => "Sigla"
    // 3 => "Endereco"
    // 4 => "Bairro"
    // 5 => "CEP"
    // 6 => "Municipio"
    // 7 => "UF"
    // 8 => "CPF"
    // 9 => "Contato"
    // 10 => "Cargo"
    // 11 => "E-mail"
    // 12 => "DDD1"
    // 13 => "Fone"
    // 14 => "DDD2"
    // 15 => "Celular"
    // 16 => "Dt_Inscricao"
    // 17 => "Boleto"
    // 18 => "Valor"
    // 19 => "Vencto."
    // 20 => "Situacao"
    // 21 => "Dt_Pago"
    // 22 => "CNPJ_Ente"
    // 23 => "CNPJ_Legislativo"
    /*
    |--------------------------------------------------------------------------
    |  Features saveAndGoBackResponse
    |--------------------------------------------------------------------------
    | Rota de redirecionamento apos a criação bem sucedida de um novo registro
    |
    */
     /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAndGoBackResponse()
    {
          return redirect()->route("admin.instituicaos");
    }
    
    /*
    |--------------------------------------------------------------------------
    |  Features goBack
    |--------------------------------------------------------------------------
    | Rota de retorno para a lista de dados
    |
    */    
    public function goBack()
    {       
        return route("admin.instituicaos");
    }
}
