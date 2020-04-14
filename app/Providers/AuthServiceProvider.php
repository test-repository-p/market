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

        Gate::define('edite_comment_product',function($user,$comment){
            foreach($user->roles as $role){
                if($role->name == 'Producer' || $role->name == 'Super_Admin'){
                    if($comment->products->first()){

                    return true;
                    }

                }
            }
        });

        Gate::define('edite_comment_article',function($user,$comment){
            
            foreach($user->roles as $role){
                if($role->name == 'Author' || $role->name == 'Super_Admin'){
                    if($comment->articles->first()){
                        return true;
                    }    
                }
                
            }
        });

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
