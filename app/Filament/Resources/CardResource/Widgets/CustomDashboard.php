<?php

namespace App\Filament\Resources\CardResource\Widgets;

use App\Models\Register;
use App\Models\Subscriber;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CustomDashboard extends BaseWidget
{

    protected function getCards(): array
    {
        return [
            Card::make('Registers', Register::count())
            ->description('32% increase')->color('success')
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart([15, 30, 35, 40, 50, 90, 100])
            ,
            Card::make('Subscribers', Subscriber::count())
            ->description('25% increase')->color('success')
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart([15, 30, 35, 40, 50, 90, 100])
            ,
        ];
    }
}