<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PaymentsChart extends LineChartWidget
{
    protected static ?string $heading = 'Payments';

    protected static ?int $sort = 2;

    public ?string $filter = 'today';

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $LastMonth = Trend::model(Payment::class)
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
                    'label' => 'Payment Amount',
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
