<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\RefundMethod;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormSubscription extends Component
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
     * @var Subscriber
     */
    public $email;
    public $investor_type;
    public $khmer_trading_name;
    public $english_trading_name;
    public $investor_id;
    public $trading_acc_number;
    public $security_firm_name;
    public $contact;
    public $file;
    public $subscriber_status;
    public $comment;
    public $user_id;

    /**
     * @var Payment
     */
    public $currency = 'KHR';
    public $unit_price;
    public $quantity;
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
        'unit_price' => 'required',
        'quantity' => 'required',
        'amount' => 'required',
        'actual_deposit' => 'required',
        'payment_attach' => 'required',
    ];

    public function handleSubmit()
    {
        // $this->validate();
        $record = Subscriber::where('register_id', Session::get('loginId'))->first();

        if ($this->currency == 'KHR') {

            $res = Payment::create([
                'subscriber_id' => $record->id,
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
            $this->clearSession();
            return redirect('/complete_subscription');
        }
    }

    public function clearSession(){
        if (Session::has('loginId')) {
            session()->forget('loginId');
            return redirect('/login');
        }
    }

    public function render()
    {
        $this->company = Company::latest()->first();
        $this->payment_method = PaymentMethod::all();
        $this->refund_method = RefundMethod::all();

        $record = Subscriber::where('register_id', Session::get('loginId'))->first();

        if ($record) {
            $subscriber = Subscriber::findOrFail($record->id);
            $this->investor_type = $subscriber->investor_type;
            $this->khmer_trading_name = $subscriber->khmer_trading_name;
            $this->english_trading_name = $subscriber->english_trading_name;
            $this->trading_acc_number = $subscriber->trading_acc_number;
            $this->investor_id = $subscriber->investor_id;
            $this->security_firm_name = $subscriber->security_firm_name;
            $this->contact = $subscriber->contact;
            $this->email = $subscriber->email;
            $this->file = $subscriber->legal_entity_signature;
        }

        return view('livewire.form-subscription');
    }
}
