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

class EditSubscription extends Component
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
        $this->validate();
        $record = Subscriber::where('register_id', Session::get('loginId'))->first();
        if ($record->status == 'edited') {
            if ($this->file != '') {
                try {
                    $record->update([
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
                    $this->clearSession();
                    return redirect('/complete_subscription');
                } catch (Exception $e) {
                    session()->flash('error', $e->getMessage());
                }
            } else {
                try {
                    $record->update([
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
                    $this->clearSession();
                    return redirect('/complete_subscription');
                } catch (Exception $e) {
                    session()->flash('error', $e->getMessage());
                }
            }
        } else {
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
        // $this->company = Company::latest()->first();
        // $this->payment_method = PaymentMethod::all();
        // $this->refund_method = RefundMethod::all();
        // $payment = Payment::latest()->first();
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
        } else {
            $this->investor_type = '';
            $this->khmer_trading_name = '';
            $this->english_trading_name = '';
            $this->trading_acc_number = '';
            $this->investor_id = '';
            $this->security_firm_name = '';
            $this->contact = '';
            $this->email = '';
            $this->file = '';
        }

        // if ($payment) {
        //     $this->currency = $payment->currency;
        //     $this->khr_price = $payment->khr_price;
        //     $this->usd_price = $payment->usd_price;
        //     $this->quantity = $payment->quantity;
        //     $this->amount = $payment->amount;
        //     $this->actual_deposit = $payment->autual_deposit;
        //     $this->bank_name = $payment->bank_name;
        //     $this->bank_acc_name = $payment->bank_account_name;
        //     $this->bank_acc_number = $payment->bank_account_number;
        //     $this->bank_acc_currency = $payment->bank_account_currency;
        //     $this->payment_attach = $payment->file;
        // } else {
        //     $this->currency = '';
        //     $this->khr_price = '';
        //     $this->usd_price = '';
        //     $this->quantity = '';
        //     $this->amount = '';
        //     $this->actual_deposit = '';
        //     $this->bank_name = '';
        //     $this->bank_acc_name = '';
        //     $this->bank_acc_number = '';
        //     $this->bank_acc_currency = '';
        //     $this->payment_attach = '';
        // }


        return view('livewire.edit-subscription');
    }
}
