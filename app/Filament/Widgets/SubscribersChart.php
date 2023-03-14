<?php

namespace App\Filament\Widgets;

use App\Models\Subscriber;
use Flowframe\Trend\Trend;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\TrendValue;

class SubscribersChart extends LineChartWidget
{
    protected static ?string $heading = 'Chart';

    protected static ?int $sort = 1;
    
    public ?string $filter = 'today';

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $LastMonth = Trend::model(Subscriber::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
        $perMonth = $LastMonth->map(fn (TrendValue $value) => (($value->aggregate)));
        return [
            'datasets' => [
                [
                    'label' => 'Subscriber',
                    'data' => $perMonth,
                ],
            ],
            'labels' => $LastMonth->map(fn (TrendValue $value) => (date_format(date_create($value->date), 'M')
            )),
        ];
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
}
