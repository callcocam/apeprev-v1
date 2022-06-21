<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Associados\Includes;

use App\Http\Livewire\AbstractPaginaComponent;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Actions\Fortify\PasswordValidationRules;
use Laravel\Jetstream\Jetstream;
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Models\Instituicao;
use App\Models\User;
use App\Models\Auth\Acl\Role;

class UserComponent extends AbstractPaginaComponent
{
    use PasswordValidationRules;
    /**
    * The guard implementation.
    *
    * @var \Illuminate\Contracts\Auth\StatefulGuard
    */
   protected $guard;

   public function mount(Instituicao $model, $data=[])
   {
 
       $this->setFormProperties($model);
      
   }
    /**
     * @param null $model
     */
    protected function setFormProperties($model = null)
    {
        $this->model = $model;
        data_set($this->data,"instituicao_id", $model->id);
        data_set($this->data,"office_id",null);
       // unset($this->data['email']);
    }
     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function route(){
       \Route::get($this->path(), static::class)->name($this->route_name());
    }

    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function order(){
        return 1000;
     }

     protected $messages = [
        'data.name.required' => 'O campo Nome é obrigatório.',
        'data.password.required' => 'O campo Senha é obrigatório.',
        'data.password.confirmed' => 'O campo Senha deve ser igual ao campo Confirmação de senha.',
        //'data.office_id.required' => 'O campo Tipo de associação é obrigatório.',
        'data.email.required' => 'O campo E-Mail é obrigatório.',
        'data.email.email' => 'O campo E-Mail deve ser um endereço válido',
    ];

       /**
     * Create a new registered user.
     *
     * @return \Laravel\Fortify\Contracts\RegisterResponse
     */
    public function store(): \Laravel\Fortify\Contracts\RegisterResponse
    {
    
        $this->validate([
            'data.name' => ['required', 'string', 'max:255'],
            'data.instituicao_id' => ['required'],
           /// 'data.office_id' => ['required'],
            'data.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'data.password' => $this->passwordRules(),
            'data.terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ]);
        config([
            'fortify.home'=>route('associados.associe-se.finalizar', $this->model)
        ]);
        $user =  User::create($this->data);
        event(new Registered($user));
        $role = Role::query()->where('slug',config('acl.administrador_instituto', 'administrador-do-instituto'))->first();
        if($role){
            $user->roles()->sync([$role->id]);
        }

        app(StatefulGuard::class)->login($user);

        return app(\Laravel\Fortify\Contracts\RegisterResponse::class);
    }

    public function view()
    {
        return 'livewire.paginas.associados.includes.user-component';
    }
}
