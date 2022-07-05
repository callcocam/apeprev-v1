<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
         'App\Models\EventoInscricao' => 'App\Policies\EventoInscriptioPolicy',
         'App\Models\Instituicao' => 'App\Policies\InstituicaoPolicy',
         'App\Models\Representante' => 'App\Policies\RepresentantePolicy',
         'App\Models\Servidor' => 'App\Policies\ServidorPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
