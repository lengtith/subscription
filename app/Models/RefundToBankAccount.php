<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundToBankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'bank_account_name',
        'bank_account_number',
        'bank_account_currency',
    ];

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
