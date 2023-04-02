<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use App\Models\Company;
use App\Models\Purchase;
use Carbon\Carbon;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $current_date = Carbon::now()->format('Y-m-d');
        $company = Company::where('close_date', '>=', $current_date)->first();

        $purchase = Purchase::create([
            'subscriber_id' => $data['subscriber_id'],
            'currency_type' => $data['currency_type'],
            'price_per_share' => $data['price_per_share'],
            'total_share' => $data['total_share'],
            'actual_deposit' => $data['actual_deposit'],
            'company_id' => $company->id,
            'payment_method_id' => $data['payment_method_id'],
            'refund_method_id' => $data['refund_method_id'],
            'cheque_number' => $data['cheque_number'],
            'bank_name' => $data['bank_name'],
            'bank_account_name' => $data['bank_account_name'],
            'bank_account_number' => $data['bank_account_number'],
            'bank_account_currency' => $data['bank_account_currency'],
            'payment_attach' => $data['payment_attach'],
        ]);


        return static::getModel()::create([
            'purchase_id' => $purchase->id,
            'amount' => $data['amount'],
        ]);
    }
}
