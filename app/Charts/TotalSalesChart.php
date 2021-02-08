<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class TotalSalesChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['Q1', 'Q2', 'Q3', 'Q4'])
            ->dataset('Sample', [1, 2, 3, 4])
            ->dataset('Sample 2', [4, 3, 2, 1]);
    }
}
