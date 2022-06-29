<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Relatorios\Includes;

use App\Models\Relatorio;
use Tall\Form\FormComponent;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Radio;
use Tall\Form\Fields\Divider;
use Tall\Form\Fields\ColorPicker;
use Tall\Form\Fields\NativeSelect;
use Tall\Form\Fields\Toggle;
use App\Http\Livewire\Admin\Relatorios\Traits\ColumnsTrait;

class HeaderComponent extends FormComponent
{
    use ColumnsTrait;
     /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro selecionado
    |
    */
    public function mount(?Relatorio $model, $column, $name)
    {
        $coluna = $model->colunas()->where('name', $name)->first();

        if($relacionamento = $coluna->relacionamentos()->where('name', $column)->first()){
            $this->setFormProperties($relacionamento->cabecalho); 
        }
        else{
            $this->setFormProperties($coluna->cabecalho);   
        }
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
            Input::make('Label','label')->span(5)->rules('required'),
            Input::make('Largura','width')->span(3),
            Input::make('Fonte','atributo.font_name')->span(4)->rules('required'),
            Toggle::make('Bold','atributo.bold')->lg()->span(3),
            Toggle::make('Italic','atributo.italic')->lg()->span(3),
            Toggle::make('Strikethrough','atributo.strikethrough')->lg()->span(3),
            Toggle::make('Underline','atributo.underline')->lg()->span(3),
            NativeSelect::make('Tamanho da Fonte','atributo.font_size')
            ->options($this->fontSize())
            ->span(4),
            ColorPicker::make('Cor da fonte','atributo.font_color')
            ->colors($this->colors())
            ->span(4),
            ColorPicker::make('Cor de fundo','atributo.background_color')
            ->colors($this->colors())
            ->span(4),
            NativeSelect::make('Alinhameto','atributo.alignment')
            ->options([
                'left'=>'LEFT','right'=>'RIGTH','justify'=>'JUSTIFY','center'=>'CENTER'
            ])->span(4)->rules('required'),
            NativeSelect::make('Alinhameto Vertical','atributo.vertical_alignment')            
            ->options([
                'auto'=>'AUTO',
                'baseline'=>'BASELINE',
                'bottom'=>'BOTTOM',
                'center'=>'CENTER',
                'distributed'=>'DISTRIBUTED',
                'justify'=>'JUSTIFY',
                'top'=>'TOP'
            ])->span(4)->rules('required'),
            Toggle::make('Quebrar texto','atributo.wrap_text')->mt(8)->span(4)->lg()->rules('required'),
            Radio::make('Status', 'status_id')->status()->lg()
        ];
    }

    public function view()
    {
        return 'livewire.admin.relatorios.includes.header-component';
    }
}
