<?php

namespace App\Providers;

use App\Charts\TotalSalesChart;
use App\Charts\TotalSalesMonthlyChart;
use ConsoleTVs\Charts\Registrar as Charts;
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
    public function boot(Charts $charts)
    {
        $charts->register([
            TotalSalesChart::class,
            TotalSalesMonthlyChart::class
        ]);
    }
}
