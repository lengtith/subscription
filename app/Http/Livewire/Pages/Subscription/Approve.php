<?php

namespace App\Http\Livewire\Pages\Subscription;

use App\Models\Company;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Purchase;
use App\Models\RefundMethod;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class Approve extends Component
{
    use WithFileUploads;
    public $error;
    public $subscriber;


    /**
     * @var Table
     */
    public $company;
    public $payment_method_tbl;
    public $refund_method_tbl;
    public $khr_price;
    public $usd_price;
    public $payment_method_has_input;
    public $refund_method_has_input;

    /**
     * @var Subscriber
     */
    public $investor_type;
    public $khmer_trading_name;
    public $english_trading_name;
    public $investor_id;
    public $trading_acc_number;
    public $security_firm_name;
    public $contact;
    public $email;
    public $signature_attach;
    public $subscriber_status;
    public $comment;
    public $user_id;

    /**
     * @var Payment
     */
    public $currency_type = 'KHR';
    public $price_per_share;
    public $total_share;
    public $amount;
    public $actual_deposit;
    public $payment_method = 1;
    public $refund_method = 1;
    public $payment_attach;
    public $cheque_number;
    public $bank_name;
    public $bank_acc_name;
    public $bank_acc_number;
    public $bank_acc_currency;

    protected $rules = [
        'total_share' => 'required',
        'actual_deposit' => 'required',
        'payment_attach' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function handleSubmit()
    {
        $this->validate();
        if ($this->currency_type == 'KHR') {
            try {
                $purchase = Purchase::create([
                    'subscriber_id' => $this->subscriber->id,
                    'currency_type' => $this->currency_type,
                    'price_per_share' => $this->company->khr_price,
                    'total_share' => $this->total_share,
                    'actual_deposit' => $this->actual_deposit,
                    'company_id' => $this->company->id,
                    'payment_method_id' => $this->payment_method,
                    'refund_method_id' => $this->refund_method,
                    'cheque_number' => $this->cheque_number,
                    'bank_name' => $this->bank_name,
                    'bank_account_name' => $this->bank_acc_name,
                    'bank_account_number' => $this->bank_acc_number,
                    'bank_account_currency' => $this->bank_acc_currency,
                    'payment_attach' => $this->payment_attach->store('', 'public'),
                ]);
                if ($purchase) {
                    Payment::create([
                        'purchase_id' => $purchase->id,
                        'amount' => $this->company->khr_price * $this->total_share,
                    ]);
                    return redirect('/complete_subscription');
                } else {
                    session()->flash('error', 'Error while processing purchase');
                }
            } catch (\Throwable $th) {
                session()->flash('error', $th);
            }
        } else {
            try {
                $purchase = Purchase::create([
                    'subscriber_id' => $this->subscriber->id,
                    'currency_type' => $this->currency_type,
                    'price_per_share' => $this->company->usd_price,
                    'total_share' => $this->total_share,
                    'actual_deposit' => $this->actual_deposit,
                    'company_id' => $this->company->id,
                    'payment_method_id' => $this->payment_method,
                    'refund_method_id' => $this->refund_method,
                    'cheque_number' => $this->cheque_number,
                    'bank_name' => $this->bank_name,
                    'bank_account_name' => $this->bank_acc_name,
                    'bank_account_number' => $this->bank_acc_number,
                    'bank_account_currency' => $this->bank_acc_currency,
                    'payment_attach' => $this->payment_attach->store('', 'public'),
                ]);
                if ($purchase) {
                    Payment::create([
                        'purchase_id' => $purchase->id,
                        'amount' => $this->company->usd_price * $this->total_share,
                    ]);
                    return redirect('/complete_subscription');
                } else {
                    session()->flash('error', 'Error while processing purchase');
                }
            } catch (\Throwable $th) {
                session()->flash('error', $th);
            }
        }
    }

    public function clearForm()
    {
        $this->investor_type = 'individual';
        $this->currency_type = 'KHR';
        $this->total_share = null;
        $this->actual_deposit = "";
        $this->payment_method = 1;
        $this->refund_method = 1;
        $this->payment_attach = "";
        $this->cheque_number = null;
        $this->bank_name = null;
        $this->bank_acc_name = null;
        $this->bank_acc_number = null;
        $this->bank_acc_currency = null;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        $payment = PaymentMethod::where('id', $this->payment_method)->first();
        $refund = RefundMethod::where('id', $this->refund_method)->first();

        if ($payment->has_input == true) {
            $this->payment_method_has_input = 1;
        } else {
            $this->payment_method_has_input = 0;
            $this->cheque_number = null;
        }

        if ($refund->has_input == true) {
            $this->refund_method_has_input = true;
        } else {
            $this->refund_method_has_input = false;
            $this->bank_name = null;
            $this->bank_acc_name = null;
            $this->bank_acc_number = null;
            $this->bank_acc_currency = null;
        }
    }

    public function mount()
    {
        if (Session::has('loginId')) {
            $this->subscriber = Subscriber::where('register_id', Session::get('loginId'))->first();
            if ($this->subscriber->status != 'approved') {
                return redirect('/complete_subscription');
            }
        }

        if (Session::has('loginId')) {
            $registerId = Session::get('loginId');
            $subscriberItem = Subscriber::where('register_id', $registerId)->first();
            if ($subscriberItem->status == 'approved') {
                $this->investor_type = $subscriberItem->investor_type;
                $this->khmer_trading_name = $subscriberItem->khmer_trading_name;
                $this->english_trading_name = $subscriberItem->english_trading_name;
                $this->trading_acc_number = $subscriberItem->trading_acc_number;
                $this->investor_id = $subscriberItem->investor_id;
                $this->security_firm_name = $subscriberItem->security_firm_name;
                $this->contact = $subscriberItem->contact;
                $this->email = $subscriberItem->email;
                $this->signature_attach = $subscriberItem->signature_attach;
            }
        }
    }

    public function render()
    {
        $this->company = Company::latest()->first();
        $this->payment_method_tbl = PaymentMethod::all();
        $this->refund_method_tbl = RefundMethod::all();

        return view('livewire.pages.subscription.approve')->layout('layouts.app', ['pageTitle' => 'Subscription form']);
    }
}
