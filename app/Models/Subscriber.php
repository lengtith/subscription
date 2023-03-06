<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_id',
        'investor_type',
        'khmer_trading_name',
        'english_trading_name',
        'trading_acc_number',
        'investor_id',
        'security_firm_name',
        'contact',
        'email',
        'legal_entity_signature',
        'subscriber_status',
        'comment',
        'user_id',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function subscription_ids()
    {
        return $this->hasMany(SubscriptionId::class);
    }

    // public function getFullNameAttribute()
    // {
    //     return $this->first_name . ' ' . $this->last_name;
    // }

    // protected $appends = ['full_name'];
}
