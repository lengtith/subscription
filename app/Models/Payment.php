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
        'currency',
        'unit_price',
        'quantity',
        'amount',
        'actual_deposit',
        'status',
        'cheque_number',
        'bank_name',
        'bank_account_name',
        'bank_account_number',
        'bank_account_currency',
        'file',
        'user_id'
    ];

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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
