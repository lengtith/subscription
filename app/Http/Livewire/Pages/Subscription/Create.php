<?php

namespace App\Http\Livewire\Pages\Subscription;

use App\Models\Company;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\RefundMethod;
use App\Models\Subscriber;
use Exception;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    /**
     * @var Table
     */
    public $company;
    public $payment_method_tbl;
    public $refund_method_tbl;
    public $khr_price = 0;
    public $usd_price = 0;
    public $subscriberItem;

    /**
     * @var Subscriber
     */
    public $email;
    public $investor_type = 'individual';
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
    public $error;

    /**
     * @var Payment
     */
    public $currency = 'KHR';
    public $unit_price;
    public $quantity;
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
        'investor_type' => 'required',
        'khmer_trading_name' => 'required|max:255',
        'english_trading_name' => 'required|max:255',
        'trading_acc_number' => 'required',
        'investor_id' => 'required',
        'security_firm_name' => 'required|max:255',
        'contact' => 'required',
        'email' => 'required|email',

        'quantity' => 'required',
        'actual_deposit' => 'required',
        'payment_method' => 'required',
        'refund_method' => 'required',
        'payment_attach' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function handleSubmit()
    {
        $this->validate();

        if ($this->file != '') {
            try {
                $data = Subscriber::create([
                    'register_id' => Session::get('loginId'),
                    'investor_type' => $this->investor_type,
                    'khmer_trading_name' => $this->khmer_trading_name,
                    'english_trading_name' => $this->english_trading_name,
                    'trading_acc_number' => $this->trading_acc_number,
                    'investor_id' => $this->investor_id,
                    'security_firm_name' => $this->security_firm_name,
                    'contact' => $this->contact,
                    'email' => $this->email,
                    'legal_entity_signature' => $this->file->store('', 'public'),
                ]);

                if ($data) {

                    if ($this->currency == 'KHR') {
                        try {
                            $payment = Payment::create([
                                'subscriber_id' => $data->id,
                                'currency' => $this->currency,
                                'unit_price' => $this->company->khr_price,
                                'quantity' => $this->quantity,
                                'amount' => $this->company->khr_price * $this->quantity,
                                'actual_deposit' => $this->actual_deposit,
                                'company_id' => $this->company->id,
                                'payment_method_id' => $this->payment_method,
                                'refund_method_id' => $this->refund_method,
                                'bank_name' => $this->bank_name,
                                'bank_account_name' => $this->bank_acc_name,
                                'bank_account_number' => $this->bank_acc_number,
                                'bank_account_currency' => $this->bank_acc_currency,
                                'file' => $this->payment_attach->store('', 'public'),
                            ]);
                            return redirect('/complete_subscription');
                        } catch (Exception $e) {
                            session()->flash('error', $e->getMessage());
                        }
                    } else {
                        try {
                            $payment = Payment::create([
                                'subscriber_id' => $data->id,
                                'currency' => $this->currency,
                                'unit_price' => $this->company->usd_price,
                                'quantity' => $this->quantity,
                                'amount' => $this->company->usd_price * $this->quantity,
                                'actual_deposit' => $this->actual_deposit,
                                'company_id' => $this->company->id,
                                'payment_method_id' => $this->payment_method,
                                'refund_method_id' => $this->refund_method,
                                'bank_name' => $this->bank_name,
                                'bank_account_name' => $this->bank_acc_name,
                                'bank_account_number' => $this->bank_acc_number,
                                'bank_account_currency' => $this->bank_acc_currency,
                                'file' => $this->payment_attach->store('', 'public'),
                            ]);
                            return redirect('/complete_subscription');
                        } catch (Exception $e) {
                            session()->flash('error', $e->getMessage());
                        }
                    }
                } else {
                    session()->flash('error', 'Something went wrong');
                }
            } catch (Exception $e) {
                session()->flash('error', $e->getMessage());
            }
        } else {
            try {
                $data = Subscriber::create([
                    'register_id' => Session::get('loginId'),
                    'investor_type' => $this->investor_type,
                    'khmer_trading_name' => $this->khmer_trading_name,
                    'english_trading_name' => $this->english_trading_name,
                    'trading_acc_number' => $this->trading_acc_number,
                    'investor_id' => $this->investor_id,
                    'security_firm_name' => $this->security_firm_name,
                    'contact' => $this->contact,
                    'email' => $this->email,
                ]);
                if ($data) {

                    if ($this->currency == 'KHR') {
                        try {
                            $payment = Payment::create([
                                'subscriber_id' => $data->id,
                                'currency' => $this->currency,
                                'unit_price' => $this->company->khr_price,
                                'quantity' => $this->quantity,
                                'amount' => $this->company->khr_price * $this->quantity,
                                'actual_deposit' => $this->actual_deposit,
                                'company_id' => $this->company->id,
                                'payment_method_id' => $this->payment_method,
                                'refund_method_id' => $this->refund_method,
                                'bank_name' => $this->bank_name,
                                'bank_account_name' => $this->bank_acc_name,
                                'bank_account_number' => $this->bank_acc_number,
                                'bank_account_currency' => $this->bank_acc_currency,
                                'file' => $this->payment_attach->store('', 'public'),
                            ]);
                            return redirect('/complete_subscription');
                        } catch (Exception $e) {
                            session()->flash('error', $e->getMessage());
                        }
                    } else {
                        try {
                            $payment = Payment::create([
                                'subscriber_id' => $data->id,
                                'currency' => $this->currency,
                                'unit_price' => $this->company->usd_price,
                                'quantity' => $this->quantity,
                                'amount' => $this->company->usd_price * $this->quantity,
                                'actual_deposit' => $this->actual_deposit,
                                'company_id' => $this->company->id,
                                'payment_method_id' => $this->payment_method,
                                'refund_method_id' => $this->refund_method,
                                'bank_name' => $this->bank_name,
                                'bank_account_name' => $this->bank_acc_name,
                                'bank_account_number' => $this->bank_acc_number,
                                'bank_account_currency' => $this->bank_acc_currency,
                                'file' => $this->payment_attach->store('', 'public'),
                            ]);
                            return redirect('/complete_subscription');
                        } catch (Exception $e) {
                            session()->flash('error', $e->getMessage());
                        }
                    }
                    return redirect('/complete_subscription');
                } else {
                    session()->flash('error', 'Something went wrong');
                }
            } catch (Exception $e) {
                session()->flash('error', $e->getMessage());
            }
        }
    }

    public function clearForm()
    {
        $this->investor_type = 'individual';
        $this->khmer_trading_name = "";
        $this->english_trading_name = "";
        $this->investor_id = null;
        $this->trading_acc_number = null;
        $this->security_firm_name = "";
        $this->contact = "";
        $this->email = "";
        $this->file = "";
        $this->currency = 'KHR';
        $this->quantity = null;
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

    public function mount()
    {
        $registerId = Session::get('loginId');
        $subscriber = Subscriber::where('register_id', $registerId)->first();
        if ($subscriber) {
            return redirect('/complete_subscription');
        }
    }

    public function render()
    {
        $this->company = Company::whereDate('close_date', '>=', now()->format('Y-m-d'))->latest()->first();
        $this->payment_method_tbl = PaymentMethod::all();
        $this->refund_method_tbl = RefundMethod::all();

        return view('livewire.pages.subscription.create')->layout('layouts.app', ['pageTitle' => 'Create subscription']);
    }
}
