<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas\Auth;

use App\Http\Livewire\AbstractPaginaComponent;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Actions\Fortify\PasswordValidationRules;
use Laravel\Jetstream\Jetstream;
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterComponent extends AbstractPaginaComponent
{
    use PasswordValidationRules;
     /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    public $createNew = 0;
    public $data = ["document"=>""];
     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */
    public function mount(){
       $data = User::factory()->make()->toArray();
       $this->data['instituicao_id'] = "";
       $this->data['office_id'] = "";
       $this->data['name'] = data_get($data,'name');
       $this->data['email'] = data_get($data,'email');
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

    public function view()
    {
        return 'livewire.paginas.auth.register-component';
    }

    public function updatedDataInstituicaoId($value)
    {
        if($instituicao = \App\Models\Instituicao::find($value)){
           $this->createNew =0;
           $this->data['document'] = $instituicao->document;
           $this->data['intituition_name'] = $instituicao->name;
        }
        else{
            $this->createNew =1;
            $this->data['document'] = "";
            $this->data['intituition_name'] = "";
        }
    }

  
    /**
     * Create a new registered user.
     *
     * @return \Laravel\Fortify\Contracts\RegisterResponse
     */
    public function store(): \Laravel\Fortify\Contracts\RegisterResponse
    {
      
        if($this->createNew){
            $this->validate([
                'data.intituition_name' => ['required', 'string', 'max:255'],
                'data.document' => ['required', 'string', 'max:255', 'unique:instituicoes,document'],
                'data.office_id' => ['required'],
                'data.name' => ['required', 'string', 'max:255'],
                'data.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'data.password' => $this->passwordRules(),
                'data.terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            ]);
            if($instituicao = \App\Models\Instituicao::create([
                "document" => data_get($this->data,'document'),
                "office_id" => data_get($this->data,'office_id'),
                "name" => data_get($this->data,'intituition_name')
            ])){
                data_set($this->data,'instituicao_id', $instituicao->id);
             }

         }
         else{
            $this->validate([
                'data.name' => ['required', 'string', 'max:255'],
                'data.instituicao_id' => ['required'],
                'data.office_id' => ['required'],
                'data.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'data.password' => $this->passwordRules(),
                'data.terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            ]);
         }
        if($redirect = data_get($this->data,'redirect')){
            config([
                'fortify.home'=>$redirect
            ]);
         }
         $this->data['password'] = Hash::make($this->data['password']);
         event(new Registered($user =  User::create($this->data)));

        app(StatefulGuard::class)->login($user);

        return app(\Laravel\Fortify\Contracts\RegisterResponse::class);
    }
}
