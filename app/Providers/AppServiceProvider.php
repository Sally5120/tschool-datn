<?php

namespace App\Providers;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Models\contact;
use App\Models\Statistical;
use App\Models\CategorySubject;
use App\Models\CategoryTeacher;
use App\Models\PostClass;
use App\Models\News;
use Facade\FlareClient\View;

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
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
        Carbon::setLocale('vi');
        View()->composer('*',function($view){
        $demtintuc= News::all()->count();
        $demkhoahoc = PostClass::all()->count();
        $demmonhoc=CategorySubject::all()->count();
        $demhocsinhdangky = contact::all()->count();
        $demgiaovien =CategoryTeacher::all()->count();
        $view->with('demtintuc',$demtintuc)->with('demkhoahoc',$demkhoahoc)->with('demhocsinhdangky',$demhocsinhdangky)->with('demmonhoc',$demmonhoc)->with('demgiaovien',$demgiaovien);

        });
    }
}
