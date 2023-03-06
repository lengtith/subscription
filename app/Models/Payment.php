<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscriber_id',
        'company_id',
        'payment_method_id',
        'refund_method_id',
        'refund_to_bank_acc_id',
        'unit_price',
        'quantity',
        'amount',
        'autual_deposit',
        'status'
    ];

    public $bankAccount = RefundToBankAccount::class;

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
    public function refund_method()
    {
        return $this->belongsTo(RefundMethod::class);
    }
    public function refund_to_bank_acc()
    {
        return $this->belongsTo(RefundToBankAccount::class);
    }

    public function getBankNameAttribute($bankAccount){
        return $this->bankAccount['bank_name'];
    }

    public function getBankAccountNameAttribute()
    {
        return $this->bankAccount['bank_account_name'];
    }
    public function getBankAccountNumberAttribute()
    {
        return $this->bankAccount['bank_account_number'];
    }
    public function getBankAccountCurrencyAttribute()
    {
        return $this->bankAccount['bank_account_currency'];
    }

    protected $appends = ['bank_name','bank_account_name','bank_account_number','bank_account_currency'];
}
