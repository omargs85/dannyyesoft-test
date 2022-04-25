<?php

namespace App\Providers;

use App\Structs\TWScopes;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensCan([
            TWScopes::$CORPORATIVOS => 'Corporativos',
            TWScopes::$EMPRESAS_CORPORATIVOS => 'Empreass Corporativos',
            TWScopes::$CONTRATOS_CORPORATIVOS => 'Contratos Corporativos',
            TWScopes::$CONTACTOS_CORPORATIVOS => 'Contactos Corporativos',
            TWScopes::$DOCUMENTOS => 'Documentos',
            TWScopes::$DOCUMENTOS_CORPORATIVOS => 'Documentos Corporativos',
        ]);
    }
}
