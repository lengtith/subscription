<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use App\Mail\SendReceipt;
use App\Models\Subscriber;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class EditPayment extends EditRecord
{
    protected static string $resource = PaymentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        if ($data['status'] == true) {
            $subscriber = Subscriber::findOrFail($data['subscriber_id']);
            $mail = ([
                'name' => $subscriber['name'],
                'email' => $subscriber['email'],
                'currency' => $data['unit_price'],
            ]);
            Mail::to($mail['email'])->send(new SendReceipt($mail));
        }

        return $record;
    }
}
