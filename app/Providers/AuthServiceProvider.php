<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Product;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Product::class => 'App\Policies\ProductPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach($this->getPermission() as $permission)
        {
            Gate::define($permission->name,function($user) use ($permission){
            return $user->hasRole($permission->roles);
        });
        }
        
    }
    public function getPermission()
    {
        return Permission::with('roles')->get();
    }
}
