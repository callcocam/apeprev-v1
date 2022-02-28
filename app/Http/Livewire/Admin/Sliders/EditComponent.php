<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slide;
use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\DatetimePicker;
use Tall\Form\Fields\Upload;
use Tall\Form\Fields\Radio;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditComponent extends FormComponent
{
    
  use AuthorizesRequests;
    /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota de edição de um cadastro
    |
    */
     public function route(){
        Route::get('/slider/{model}/edit', static::class)->name('admin.slider.edit');
    }

    /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro selecionado
    |
    */
    public function mount(?Slide $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model); // $slide from hereon, called $this->model
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
           'formTitle' => __('Slide'),
           'formAction' => __('Edit'),
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
            Input::make('Name')->span('5')->rules('required'),
            Input::make('url')->span('7')->rules('required'),
            Upload::make('Desktop', 'cover')->span('8')->placeholder("Select Your Image"),
            Upload::make('Mobile')->span('4')->placeholder("Select Your thumbnail"),
            DatetimePicker::make('Data Inicio','start_date')->parse_format()->span('6')->rules('required'),
            DatetimePicker::make('Data Fim','end_date')->parse_format()->span('6')->rules('required'),
            Radio::make('Status', 'status_id')->status()->lg()
        ];
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
        return route("admin.sliders");
    }
}
