<?php

namespace App\Providers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Information;
use App\Models\Logo;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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

        $categorys = Category::get();
        $countsale = Product::orderBy('countsale','desc')->paginate(6);
        $special = Product::where('special','1')->paginate(6);
        $new = Product::orderBy('id','desc')->paginate(6);
        $info = Information::where('state','1')->first();
        $logo = Logo::first();
        View::share([
            'categorys'    => $categorys,
            'countsale'   => $countsale,
            'special' => $special,
            'new'  => $new,
            'info'  => $info,
            'logo'  => $logo
        ]);

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
