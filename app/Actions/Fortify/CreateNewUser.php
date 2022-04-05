<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
          
        ])->validate();
        if(data_get($input,'intituition')){
            Validator::make($input, [
                'intituition_name' => ['required', 'string', 'max:255'],
                'document' => ['required', 'string', 'max:255', 'unique:instituicoes'],
                'office_id' => ['required'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            ])->validate();
         }
         else{
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'instituicao_id' => ['required'],
                'office_id' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            ])->validate();
         }
        if($redirect = data_get($input,'redirect')){
            config([
                'fortify.home'=>$redirect
            ]);
         }

        
         dd($input);
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'office_id' => $input['office_id'],
            'instituicao_id' => $input['instituicao_id'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
