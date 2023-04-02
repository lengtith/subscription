<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'uuid';

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
        'signature_attach',
        'status',
        'user_id',
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function subscription_ids()
    {
        return $this->hasMany(SubscriptionId::class);
    }

    public function register()
    {
        return $this->belongsTo(Register::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Purchase::class);
    }
}
