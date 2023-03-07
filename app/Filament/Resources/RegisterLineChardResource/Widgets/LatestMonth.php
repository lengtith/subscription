<?php

namespace App\Filament\Resources\RegisterLineChardResource\Widgets;

use App\Models\Register;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class LatestMonth extends LineChartWidget
{
    protected static ?string $heading = 'Registers Last Month';

    protected function getData(): array
    {
        $data = Trend::model(Register::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Register',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) =>(
              date_format(date_create($value->date),'M')
            )),
        ];
    }
}