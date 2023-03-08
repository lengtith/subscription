<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\RefundMethod;
use App\Models\Subscriber;
use Exception;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateSubscription extends Component
{
    use WithFileUploads;

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
    public $error;

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
        'investor_type' => 'required',
        'khmer_trading_name' => 'required|max:255',
        'english_trading_name' => 'required|max:255',
        'trading_acc_number' => 'required',
        'investor_id' => 'required',
        'security_firm_name' => 'required|max:255',
        'contact' => 'required',
        'email' => 'required|email',

        'currency' => 'required',
        'unit_price' => 'required',
        'quantity' => 'required',
        'amount' => 'required',
        'actual_deposit' => 'required'
    ];

    public function handleSubmit()
    {

        $subscriber = '';
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

                $this->payment($data->id);
                $this->clearSession();
                return redirect('/complete_subscription');
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

                $this->payment($data->id);
                $this->clearSession();
                return redirect('/complete_subscription');
            } catch (Exception $e) {
                session()->flash('error', $e->getMessage());
            }
        }
    }
    public function payment($subscriber)
    {
        if ($this->currency == 'KHR') {
            try {
                Payment::create([
                    'subscriber_id' => $subscriber,
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
                $this->resetForm();
            } catch (Exception $e) {
                session()->flash('error', $e->getMessage());
            }
        } else {
            try {
                Payment::create([
                    'subscriber_id' => $subscriber,
                    'currency' => $this->currency,
                    'unit_price' => $this->company->usd_price,
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
                $this->resetForm();
            } catch (Exception $e) {
                session()->flash('error', $e->getMessage());
            }
        }
    }

    public function clearSession(){
        if (Session::has('loginId')) {
            session()->forget('loginId');
            return redirect('/login');
        }
    }

    public function resetForm()
    {
        $this->investor_type = '';
        $this->khmer_trading_name = '';
        $this->english_trading_name = '';
        $this->trading_acc_number = '';
        $this->investor_id = '';
        $this->security_firm_name = '';
        $this->contact = '';
        $this->email = '';
        $this->payment_attach = '';
        $this->currency = 'KHR';
        $this->khr_price = '';
        $this->usd_price = '';
        $this->quantity = '';
        $this->amount = '';
        $this->actual_deposit = '';
        $this->bank_name = '';
        $this->bank_acc_name = '';
        $this->bank_acc_number = '';
        $this->bank_acc_currency = '';
        $this->payment_attach = '';
    }

    public function render()
    {
        $this->company = Company::latest()->first();
        $this->payment_method = PaymentMethod::all();
        $this->refund_method = RefundMethod::all();

        return view('livewire.create-subscription');
    }
}
