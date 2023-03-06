<?php

namespace App\Filament\Resources\SubscriberStatusResource\Pages;

use App\Filament\Resources\SubscriberStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSubscriberStatuses extends ManageRecords
{
    protected static string $resource = SubscriberStatusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
