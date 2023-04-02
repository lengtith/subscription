<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'purchase_id',
        'amount',
        'status',
        'user_id'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function getSubscriberAttribute()
    // {
    //     $purchase = Purchase::where('id', $this->purchase_id)->first();
    //     $subscriber = Subscriber::where('id', $purchase->subscriber_id)->first();
    //     return $subscriber;
    // }

    // protected $appends = ['subscriber'];
}
