<?php

namespace App\Filament\Resources\RefundMethodResource\Pages;

use App\Filament\Resources\RefundMethodResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageRefundMethods extends ManageRecords
{
    protected static string $resource = RefundMethodResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
