<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionId extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscriber_id',
        'company_id',
        'code',
        'status',
        'email_sent'
    ];

    public function subscriber(){
        return $this->belongsTo(Subscriber::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
