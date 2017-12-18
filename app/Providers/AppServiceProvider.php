<?php

namespace App\Providers;

use App\Category;
use DB;
use Illuminate\Support\ServiceProvider;
use function Symfony\Component\HttpKernel\Tests\controller_func;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories_name= Category::all();
//    $categories_name = DB::table('categories')
//            ->select('categories.id','categories.cate')
//            ->join('flowers', 'flowers.cate_id', '=','categories.id')
//            ->where('flowers.cate_id', '>', 0)
//            ->groupBy('categories.id')
//            ->orderBy('categories.cate')
//            ->get();
        view()->share('categories_name', $categories_name);
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
