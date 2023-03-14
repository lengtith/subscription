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
        'is_sent',
        'user_id',
    ];

    public function subscriber(){
        return $this->belongsTo(Subscriber::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
