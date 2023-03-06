<?php

namespace App\Filament\Resources\SubscriptionIdResource\Pages;

use App\Filament\Resources\SubscriptionIdResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubscriptionId extends EditRecord
{
    protected static string $resource = SubscriptionIdResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
