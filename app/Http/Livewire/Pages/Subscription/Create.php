<?php

namespace App\Http\Livewire\Pages\Subscription;

use App\Models\Company;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Purchase;
use App\Models\RefundMethod;
use App\Models\Register;
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
    public $registerId;
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
    public $signature_attach;
    public $subscriber_status;
    public $comment;
    public $user_id;
    public $error;

    /**
     * @var Purchase
     */
    public $currency_type = 'KHR';
    public $price_per_share;
    public $total_share;
    public $actual_deposit;
    public $payment_method = 1;
    public $refund_method = 1;
    public $payment_attach;
    public $cheque_number;
    public $bank_name;
    public $bank_acc_name;
    public $bank_acc_number;
    public $bank_acc_currency;
    public $payment_method_has_input;
    public $refund_method_has_input;

    /**
     * @var Payment
     */
    public $amount;

    protected $rules = [
        'investor_type' => 'required',
        'khmer_trading_name' => 'required|max:255',
        'english_trading_name' => 'required|max:255',
        'trading_acc_number' => 'required',
        'investor_id' => 'required',
        'security_firm_name' => 'required|max:255',
        'contact' => 'required',
        'email' => 'required|email',

        'total_share' => 'required',
        'actual_deposit' => 'required',
        'payment_method' => 'required',
        'refund_method' => 'required',
        'payment_attach' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function handleSubmit()
    {
        $this->validate();

        if ($this->signature_attach != '') {
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
                    'signature_attach' => $this->signature_attach->store('', 'public'),
                ]);

                if ($data) {

                    if ($this->currency_type == 'KHR') {
                        try {
                            $purchase = Purchase::create([
                                'subscriber_id' => $data->id,
                                'currency_type' => $this->currency_type,
                                'price_per_share' => $this->company->khr_price,
                                'total_share' => $this->total_share,
                                'actual_deposit' => $this->actual_deposit,
                                'company_id' => $this->company->id,
                                'payment_method_id' => $this->payment_method,
                                'refund_method_id' => $this->refund_method,
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

                                Register::whereId($this->registerId)->update([
                                    'is_subscribed' => true,
                                ]);
                                return redirect('/complete_subscription');
                            }
                        } catch (Exception $e) {
                            session()->flash('error', $e->getMessage());
                        }
                    } else {
                        try {
                            $purchase = Purchase::create([
                                'subscriber_id' => $data->id,
                                'currency_type' => $this->currency_type,
                                'price_per_share' => $this->company->usd_price,
                                'total_share' => $this->total_share,
                                'actual_deposit' => $this->actual_deposit,
                                'company_id' => $this->company->id,
                                'payment_method_id' => $this->payment_method,
                                'refund_method_id' => $this->refund_method,
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

                                Register::whereId($this->registerId)->update([
                                    'is_subscribed' => true,
                                ]);
                                return redirect('/complete_subscription');
                            }

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

                    if ($this->currency_type == 'KHR') {
                        try {
                            $purchase = Purchase::create([
                                'subscriber_id' => $data->id,
                                'currency_type' => $this->currency_type,
                                'price_per_share' => $this->company->khr_price,
                                'total_share' => $this->total_share,
                                'actual_deposit' => $this->actual_deposit,
                                'company_id' => $this->company->id,
                                'payment_method_id' => $this->payment_method,
                                'refund_method_id' => $this->refund_method,
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

                                Register::whereId($this->registerId)->update([
                                    'is_subscribed' => true,
                                ]);
                                return redirect('/complete_subscription');
                            } else {
                                session()->flash('error', 'Error while processing purchase');
                            }
                        } catch (Exception $e) {
                            session()->flash('error', $e->getMessage());
                        }
                    } else {
                        try {
                            $purchase = Purchase::create([
                                'subscriber_id' => $data->id,
                                'currency_type' => $this->currency_type,
                                'price_per_share' => $this->company->usd_price,
                                'total_share' => $this->total_share,
                                'actual_deposit' => $this->actual_deposit,
                                'company_id' => $this->company->id,
                                'payment_method_id' => $this->payment_method,
                                'refund_method_id' => $this->refund_method,
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

                                Register::whereId($this->registerId)->update([
                                    'is_subscribed' => true,
                                ]);
                                return redirect('/complete_subscription');
                            }

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
        $this->signature_attach = "";
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

    public function mount()
    {
        $this->registerId = Session::get('loginId');
        $subscriber = Subscriber::where('register_id', $this->registerId)->first();
        if ($subscriber) {
            return redirect('/complete_subscription');
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        
        $payment = PaymentMethod::where('id', $this->payment_method)->first();
        $refund = RefundMethod::where('id', $this->refund_method)->first();

        if ($payment->has_input == true) {
            $this->payment_method_has_input = true;
        } else {
            $this->payment_method_has_input = false;
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

    public function render()
    {
        $this->company = Company::whereDate('close_date', '>=', now()->format('Y-m-d'))->latest()->first();
        $this->payment_method_tbl = PaymentMethod::all();
        $this->refund_method_tbl = RefundMethod::all();

        return view('livewire.pages.subscription.create')->layout('layouts.app', ['pageTitle' => 'Create subscription']);
    }
}
