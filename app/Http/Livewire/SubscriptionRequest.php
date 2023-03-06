<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\PaymentMethod;
use App\Models\RefundMethod;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubscriptionRequest extends Component
{
    use WithFileUploads;

    // Payment Information
    // public $currency = 'KHR';
    // public $khr_price;
    // public $usd_price;
    // public $khr_acc_num_for_deposit, $khr_acc_name_for_deposit, $usd_acc_num_for_deposit, $usd_acc_name_for_deposit, $unit_price, $quantity, $amount, $actual_deposit,  $status;
    // public $company_id;
    // public $subscription_id;
    // public $payment_method_id;
    // public $refund_method_id;
    // public $refund_to_bank_account_id;
    // public $date;
    // public $company;
    // public $payment_method;
    // public $refund_method;
    // public $bank_name;
    // public $bank_acc_name;
    // public $bank_acc_number;
    // public $bank_acc_currency;
    // Subscriber information
    public $khmer_name, $english_name, $email, $dob, $investor_type, $khmer_trading_name, $english_trading_name, $investor_id, $trading_acc_number, $security_firm_name, $contact, $legal_entity_signature, $subscriber_status, $comment, $user_id;

    protected $rules = [
        'khmer_name' => 'required|max:255',
        'english_name' => 'required|max:255',
        'email' => 'required|email',
        'dob' => 'required|date',
        'investor_type' => 'required',
        'khmer_trading_name' => 'required|max:255',
        'english_trading_name' => 'required|max:255',
        'investor_id' => 'required|max:255',
        'trading_acc_number' => 'required|integer|max:6',
        'security_firm_name' => 'required|max:255',
        'contact' => 'required|number',
    ];

    public function handleSubmit()
    {
        $this->validate();

        $res = Subscriber::create([
            'register_id' => Session::getId(),
            'khmer_name' => $this->khmer_name,
            'english_name' => $this->english_name,
            'email' => $this->email,
            'dob' => $this->dob,
            'investor_type' => $this->investor_type,
            'khmer_trading_name' => $this->khmer_trading_name,
            'english_trading_name' => $this->english_trading_name,
            'investor_id' => $this->investor_id,
            'trading_acc_number' => $this->trading_acc_number,
            'security_firm_name' => $this->security_firm_name,
            'contact' => $this->contact,
            'legal_entity_signature' => $this->legal_entity_signature->store('', 'public'),
        ]);
        
        if ($res) {
            session()->flash('success', 'Your registration has been successfully registered');
            return redirect('/login');
        } else {
            session()->flash('error', 'Something goes wrong while creating!!');
        }
        // try {

        //     session()->flash('success', 'Created Successfully!!');
        //     return redirect('/');

        //     // $this->resetFields();
        // } catch (\Exception $e) {
        //     session()->flash('error', 'Something goes wrong while creating!!');

        //     // $this->resetFields();
        // }
    }

    // public function mount()
    // {
    //     // $this->company = Company::latest()->first();
    //     // $this->khr_price = $this->company->khr_price;
    //     // $this->usd_price = $this->company->usd_price;
    //     // $this->payment_method = PaymentMethod::all();
    //     // $this->refund_method = RefundMethod::all();
    // }

    public function render()
    {
        return view('livewire.subscription-request');
    }
}
