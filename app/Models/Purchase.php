<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'subscriber_id',
        'company_id',
        'payment_method_id',
        'refund_method_id',
        'currency_type',
        'price_per_share',
        'total_share',
        'actual_deposit',
        'cheque_number',
        'payment_attach',
        'bank_name',
        'bank_account_name',
        'bank_account_number',
        'bank_account_currency',
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
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
