<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'has_input',
        'status'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
