<?php

namespace App\Filament\Resources\SubscriberLineChardResource\Widgets;

use Filament\Widgets\LineChartWidget;

class LatestMonth extends LineChartWidget
{
    protected static ?string $heading = 'Subscribers Last Month';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => '',
                    'data' => [65, 59, 80, 81, 56, 55, 40],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}