<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Chamado;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Chamado' => 'App\Policies\ChamadoPolicy',
        'App\Chamado' => 'App\Policies\ChamadoTestePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /*
        Gate::define('ver_chamado',function($user, Chamado $chamado){
            return $user->id == $chamado->user_id;
        });
        */
    }
}
