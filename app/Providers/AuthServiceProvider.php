<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Chamado;
use App\Permissao;

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
       
        Gate::before(function($user, $ability){
            if($user->existePapel('Admin')){
                return true;             
            }
        });
       
       $permissoes = Permissao::with('papeis')->get();
       foreach($permissoes as $permissao){
            Gate::define($permissao->nome,function($user) use($permissao){
            //return $user->temUmPapelDestes($permissao->papeis) || $user->eAdmin();
            return $user->temUmPapelDestes($permissao->papeis);
        });
       }
    }

    // $permissions = Permission::with('roles')->get();
    // foreach( $permissions as $permission )
    // {           
    //     Gate::define($permission->name, function($user) use ($permission) {
    //         return $user->hasRoles($permission->roles);
    //     });
    // }

    // public function listaPermissoes()
    // {
    //     return Permissao::with('papeis')->get();
    // }
}
