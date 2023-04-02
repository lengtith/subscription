<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use App\Mail\SendReceipt;
use App\Models\Purchase;
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

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $purchase = Purchase::where('id', $data['purchase_id'])->first();
        $subscriber = Subscriber::where('id', $purchase->subscriber_id)->first();

        $data['subscriber_id'] = $subscriber->english_trading_name;
        $data['currency_type'] = $purchase->currency_type;
        $data['price_per_share'] = $purchase->price_per_share;
        $data['total_share'] = $purchase->total_share;
        $data['actual_deposit'] = $purchase->actual_deposit;
        $data['payment_method_id'] = $purchase->payment_method_id;
        $data['refund_method_id'] = $purchase->refund_method_id;
        $data['payment_attach'] = $purchase->payment_attach;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        Purchase::where('id', $data['purchase_id'])->update([
            'currency_type' => $data['currency_type'],
            'price_per_share' => $data['price_per_share'],
            'total_share' => $data['total_share'],
            'actual_deposit' => $data['actual_deposit'],
            'payment_method_id' => $data['payment_method_id'],
            'refund_method_id' => $data['refund_method_id'],
            'payment_attach' => $data['payment_attach'],
        ]);

        if ($data['status'] == true) {
            $purchase = Purchase::findOrFail($data['purchase_id']);
            $subscriber = Subscriber::findOrFail($purchase->subscriber_id);
            $mail = ([
                'name' => $subscriber['name'],
                'email' => $subscriber['email'],
                'currency' => $data['price_per_share'],
            ]);
            Mail::to($mail['email'])->send(new SendReceipt($mail));
        }

        return $record;
    }
}
