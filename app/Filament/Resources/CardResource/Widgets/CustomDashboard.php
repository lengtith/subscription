<?php

namespace App\Filament\Resources\CardResource\Widgets;

use App\Models\Register;
use App\Models\Subscriber;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class CustomDashboard extends BaseWidget
{

    protected function getCards(): array
    {


    //Register
        $register = Trend::model(Register::class)
            ->between(start: now()->startOfMonth(),end: now()->endOfMonth())
            ->perDay()
            ->count();
        $data=$register->map(fn(TrendValue $value) => $value);
        $array=$register->map(fn(TrendValue $value) => $value->aggregate);
        //total of register
        $Total = collect($array)->sum();
        //Today Date
        $Today = date_format(date_create(now()),'Y-m-d');
        foreach($data as $i){
            //Yesterday compare to Today
           if ($i->date<$Today){
                $j=$i->aggregate;
           }
           if($i->date==$Today){
                $k = $i->aggregate;
           }
        }
        //data of yesterday
            $prev = $j;
        //data of today
            $next = $k;
        //default massage
            $massage="fixed";
        //default data
            $d = 0;
        //color
            $color = 'warning';
        //massage alert
            if($prev<$next){
                $color = 'success';
                $d=($next-$prev)/$Total*100;
                $massage = "Increase";
            }elseif($prev>$next){
                $color = 'danger';
                $d=($next-$prev)/$Total*100;
                $massage = "decrease";
            }else{
                $color;
                $d;
                $massage;
            }
    //End Register

//Subscriber
    $subscriber = Trend::model(Subscriber::class)
        ->between(start: now()->startOfMonth(),end: now()->endOfMonth())
        ->perDay()
        ->count();
        $data2=$subscriber->map(fn(TrendValue $value) => $value);
        $array2=$subscriber->map(fn(TrendValue $value) => $value->aggregate);
    //total of Subscriber
    $Total2 = collect($array)->sum();
    //Today Date
    $Today2 = date_format(date_create(now()),'Y-m-d');
    foreach($data2 as $i){
        //Yesterday compare to Today
        if ($i->date<$Today2){
                $j2=$i->aggregate;
        }
        if($i->date==$Today2){
                $k2 = $i->aggregate;
        }
    }
    //data of yesterday
        $prev2 = $j2;
    //data of today
        $next2 = $k2;
    //default massage
        $massage2="fixed";
    //default data
        $d2 = 0;
    //color
        $color2 = 'warning';
    //massage alert
        if($prev2<$next2){
            $color2 = 'success';
            $d2=($next2-$prev2)/$Total2*100;
            $massage2 = "Increase";
        }elseif($prev2>$next2){
            $color2 = 'danger';
            $d2=($next2-$prev2)/$Total2*100;
            $massage2 = "decrease";
        }else{
            $color2;
            $d2;
            $massage2;
        }
//End Subscriber

        return [
            Card::make('Registers',Register::count())
            ->description(
                round($d)
                .' % '.$massage)->color($color)
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart($array->toArray())
            ,
            Card::make('Subscribers', Subscriber::count())
            ->description(
                round($d2)
                .' % '.$massage2)->color($color2)
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart($array2->toArray())
            ,
        ];
    }
}