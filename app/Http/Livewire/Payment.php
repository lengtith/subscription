<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Payment as ModelsPayment;
use App\Models\PaymentMethod;
use App\Models\RefundMethod;
use Livewire\Component;
use Livewire\WithFileUploads;

class Payment extends Component
{
    use WithFileUploads;
    public $error;


    /**
     * @var Table
     */
    public $company;
    public $payment_method;
    public $refund_method;
    public $khr_price;
    public $usd_price;

    /**
     * @var Payment
     */
    public $currency = 'KHR';
    public $unit_price;
    public $quantity = 0;
    public $amount;
    public $actual_deposit;
    public $payment_method_id;
    public $refund_method_id;
    public $payment_attach;
    public $bank_name;
    public $bank_acc_name;
    public $bank_acc_number;
    public $bank_acc_currency;

    protected $rules = [
        'currency' => 'required',
        'unit_price' => 'required',
        'quantity' => 'required',
        'amount' => 'required',
        'actual_deposit' => 'required',
        'payment_attach' => 'required',
    ];

    public function handleSubmit()
    {
        if ($this->currency == 'KHR') {

            $res = ModelsPayment::create([
                'subscriber_id' => 3,
                'currency' => $this->currency,
                'unit_price' => $this->company->khr_price,
                'quantity' => $this->quantity,
                'amount' => $this->amount,
                'autual_deposit' => $this->actual_deposit,
                'company_id' => $this->company->id,
                'payment_method_id' => $this->payment_method_id,
                'refund_method_id' => $this->refund_method_id,
                'bank_name' => $this->bank_name,
                'bank_account_name' => $this->bank_acc_name,
                'bank_account_number' => $this->bank_acc_number,
                'bank_account_currency' => $this->bank_acc_currency,
                'file' => $this->payment_attach->store('', 'public'),
            ]);
            session()->flash('success', 'Your registration has been successfully registered');
            return dd($res->id);
        }
    }

    public function render()
    {
        $this->company = Company::latest()->first();
        $this->payment_method = PaymentMethod::all();
        $this->refund_method = RefundMethod::all();
        return view('livewire.payment');
    }
}
