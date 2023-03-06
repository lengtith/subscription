<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'khr_price',
        'usd_price',
        'start_date',
        'close_date',
    ];

    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function subscription_ids(){
        return $this->hasMany(SubscriptionId::class);
    }
}
