<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Users;

use App\Models\Address;
use App\Models\User;
use Tall\Form\FormComponent;
use Tall\Form\Fields\Checkbox;
use Illuminate\Support\Facades\Route;

class RolesComponent extends FormComponent
{

    public function mount(?User $model)
    {
        //Gate::authorize()

        $this->setFormProperties($model); // $user from hereon, called $this->model
    }

    protected function view(){
        return "tall-forms::roles";
    }
    protected function formAttr(): array
    {
        return [
           'formTitle' => __('User Roles'),
           'wrapWithView' => false,
           'showDelete' => false,
       ];
    }

    public function success()
    {
        $this->model->roles()->sync(data_get($this->data,'access'));
    }
    protected function fields(): array
    {
        $query = \App\Models\Auth\Acl\Role::query();
        if($checkboxSearch = \Arr::get($this->checkboxSearch, 'access')){
            $query->where("name", "LIKE", "%{$checkboxSearch}%");
        }
        
        $options = $query->get();

        return [           
            Checkbox::make('Roles','access')->collect($options)->rules('required'),
        ];
    }
}
