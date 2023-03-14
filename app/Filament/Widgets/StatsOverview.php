<?php

namespace App\Filament\Widgets;

use App\Models\Register;
use App\Models\Subscriber;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        // return [
        //     Card::make('Unique views', '192.1k')
        //         ->description('32k increase')
        //         ->descriptionIcon('heroicon-s-trending-up')
        //         ->chart([7, 2, 10, 3, 15, 4, 17])
        //         ->color('success'),
        //     Card::make('Bounce rate', '21%'),
        //     Card::make('Average time on page', '3:12'),
        // ];

        //Register
        $register = Trend::model(Register::class)
            ->between(start: now()->startOfMonth(), end: now()->endOfMonth())
            ->perDay()
            ->count();
        $data = $register->map(fn (TrendValue $value) => $value);
        $array = $register->map(fn (TrendValue $value) => $value->aggregate);

        $Total = collect($array)->sum();

        $Today = date_format(date_create(now()), 'Y-m-d');
        foreach ($data as $i) {

            if ($i->date < $Today) {
                $j = $i->aggregate;
            }
            if ($i->date == $Today) {
                $k = $i->aggregate;
            }
        }
        
        $prev = $j;
        
        $next = $k;
        
        $massage = "fixed";
        
        $d = 0;
        
        $color = 'warning';
        
        if ($prev < $next) {
            $color = 'success';
            $d = ($next - $prev) / $Total * 100;
            $massage = "Increase";
        } elseif ($prev > $next) {
            $color = 'danger';
            $d = ($next - $prev) / $Total * 100;
            $massage = "decrease";
        } else {
            $color;
            $d;
            $massage;
        }
        

        //Subscriber
        $subscriber = Trend::model(Subscriber::class)
            ->between(start: now()->startOfMonth(), end: now()->endOfMonth())
            ->perDay()
            ->count();
        $data2 = $subscriber->map(fn (TrendValue $value) => $value);
        $array2 = $subscriber->map(fn (TrendValue $value) => $value->aggregate);
        
        $Total2 = collect($array)->sum();
        
        $Today2 = date_format(date_create(now()), 'Y-m-d');
        foreach ($data2 as $i) {
            
            if ($i->date < $Today2) {
                $j2 = $i->aggregate;
            }
            if ($i->date == $Today2) {
                $k2 = $i->aggregate;
            }
        }
        
        $prev2 = $j2;
        
        $next2 = $k2;
        
        $massage2 = "fixed";
        
        $d2 = 0;
        
        $color2 = 'warning';
        
        if ($prev2 < $next2) {
            $color2 = 'success';
            $d2 = ($next2 - $prev2) / $Total2 * 100;
            $massage2 = "Increase";
        } elseif ($prev2 > $next2) {
            $color2 = 'danger';
            $d2 = ($next2 - $prev2) / $Total2 * 100;
            $massage2 = "decrease";
        } else {
            $color2;
            $d2;
            $massage2;
        }
        

        return [
            Card::make('Registers', Register::count())
                ->description(
                    round($d)
                        . ' % ' . $massage
                )->color($color)
                ->descriptionIcon('heroicon-s-trending-up')
                ->chart($array->toArray()),
            Card::make('Subscribers', Subscriber::count())
                ->description(
                    round($d2)
                        . ' % ' . $massage2
                )->color($color2)
                ->descriptionIcon('heroicon-s-trending-up')
                ->chart($array2->toArray()),
        ];
    }
}
