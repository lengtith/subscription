<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\PaymentMethod;
use App\Models\RefundMethod;
use Livewire\Component;

class SubscriptionForm extends Component
{
    public $khmer_name, $english_name, $email, $dob, $investor_type, $khmer_trading_name, $english_trading_name, $investor_id, $trading_acc_number, $trading_acc_security_firm, $contact, $legal_entity_signature, $subscriber_status, $comment, $user_id;

    public $khr_acc_num_for_deposit, $khr_acc_name_for_deposit, $usd_acc_num_for_deposit, $usd_acc_name_for_deposit, $unit_price, $quantity, $amount, $actual_deposit,  $status;
    public $currency = 'khr';
    public $company_id;
    public $subscription_id;
    public $payment_method_id;
    public $refund_method_id;
    public $refund_to_bank_account_id;
    public $date;
    public $company;
    public $payment_method;
    public $refund_method;
    public $bank_name;
    public $bank_acc_name;
    public $bank_acc_number;
    public $bank_acc_currency;

    protected $casts = [
        'date' => 'date:Y-m-d',
    ];

    public function mount()
    {
        $this->date = now();
    }

    public function handleSubmit(){

    }

    public function render()
    {   
        $this->currency = 'KHR';
        $this->company = Company::latest()->first();
        $this->payment_method = PaymentMethod::all();
        $this->refund_method = RefundMethod::all();

        return view('livewire.subscription-form');
    }
}
