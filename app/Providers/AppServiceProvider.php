<?php

namespace App\Providers;

use App\Models\Basket;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('site.layouts.header',function($view){
            $auth = auth()->user();
            if($auth != null){
                $baskets = Basket::where('user_id',auth()->user()->id)->where('status','0')->get();
                $sum = 0;
                if(count($baskets)>0)
                {
                    foreach($baskets as $key => $value)
                    {
                        $cost = $value->price*$value->count;
                        $sum += $cost;
                    }
                }

                $view->with([
                    'baskets'=>$baskets,
                    'sum'=>$sum,
                ]);
            }
            else{
                $view->with([
                    'baskets'=>null,
                    'sum'=>null,
                ]);
            }
        });
    }
}
