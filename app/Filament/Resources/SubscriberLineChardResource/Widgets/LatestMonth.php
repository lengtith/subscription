<?php

namespace App\Filament\Resources\SubscriberLineChardResource\Widgets;

use App\Models\Register;
use App\Models\Subscriber;
use Flowframe\Trend\Trend;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\TrendValue;

class LatestMonth extends LineChartWidget
{
    protected static ?string $heading = 'Subscribers Last Month';

    protected function getData(): array
    {
        $LastMonth = Trend::model(Subscriber::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
        $perMonth = $LastMonth->map(fn(TrendValue $value) => (($value->aggregate)));
        return [
            'datasets' => [
                [
                    'label' => 'Subscriber',
                    'data' => $perMonth,
                ],
            ],
            'labels' => $LastMonth->map(fn (TrendValue $value) =>(
              date_format(date_create($value->date),'M')
            )),
        ];    }
}