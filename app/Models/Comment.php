<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'subscriber_id',
        'comment',
        'subscriber_status',
        'user_id',
    ];

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
