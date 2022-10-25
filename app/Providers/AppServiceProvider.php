<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;


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
        Paginator::useBootstrap();
        Blade::directive('money', function ($amount) {
            return "<?php echo '₱' . number_format($amount, 2); ?>";
        });
        Blade::directive('date', function ($date) {
            return "<?php echo Carbon\Carbon::parse($date)->toFormattedDateString()?>";
        });
    }
}
