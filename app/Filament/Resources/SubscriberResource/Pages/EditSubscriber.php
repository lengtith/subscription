<?php

namespace App\Filament\Resources\SubscriberResource\Pages;

use App\Filament\Resources\SubscriberResource;
use App\Models\Company;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Register;
use App\Models\Subscriber;
use Filament\Pages\Actions\Action;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class EditSubscriber extends EditRecord
{
    protected static string $resource = SubscriberResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
            Action::make('comment')->label('comment')->url(fn () => route('comment', $this->record))->openUrlInNewTab()->color('primary'),
            Action::make('subscriptionId')->url(fn () => route('subscription-id', $this->record))->openUrlInNewTab()->color('success'),
            Action::make('pdf')->url(fn () => route('pdf', $this->record))->openUrlInNewTab()->color('danger'),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        return Subscriber::create([
            'name' => 'Test',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
