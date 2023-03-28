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

class Edit extends Component
{
    use WithFileUploads;

    /**
     * @var Table
     */
    public $company;
    public $payment_method_tbl;
    public $refund_method_tbl;
    public $payment_tbl;
    public $khr_price = 0;
    public $usd_price = 0;
    public $subscriberItem;
    public $paymentId;

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
    public $signature;
    public $legal_entity_signature;
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
    public $payment_method;
    public $refund_method;
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

        if ($this->signature) {
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
                    'legal_entity_signature' => $this->signature->store('', 'public'),
                    'status' => 'new',
                ]);
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
                    'legal_entity_signature' => $this->legal_entity_signature,
                    'status' => 'new',
                ]);
                return redirect('/complete_subscription');
            } catch (Exception $e) {
                session()->flash('error', $e->getMessage());
            }
        }
    }

    public function clearSession()
    {
        if (Session::has('loginId')) {
            session()->forget('loginId');
            return redirect('/login');
        }
    }

    public function pdfPreview()
    {
        return redirect()->route('subscription.preview', [
            'id' => 1,
        ]);
    }

    public function mount()
    {

        $registerId = Session::get('loginId');
        $subscriber = Subscriber::where('register_id', $registerId)->first();
        if ($subscriber->status == 'new') {
            return redirect('/complete_subscription');
        }

        if (Session::has('loginId')) {
            $registerId = Session::get('loginId');
            $subscriberItem = Subscriber::where('register_id', $registerId)->first();
            $paymentItem = Payment::where('subscriber_id', $subscriberItem->id)->first();

            if ($subscriberItem->status == 'edited') {
                $this->investor_type = $subscriberItem->investor_type;
                $this->khmer_trading_name = $subscriberItem->khmer_trading_name;
                $this->english_trading_name = $subscriberItem->english_trading_name;
                $this->trading_acc_number = $subscriberItem->trading_acc_number;
                $this->investor_id = $subscriberItem->investor_id;
                $this->security_firm_name = $subscriberItem->security_firm_name;
                $this->contact = $subscriberItem->contact;
                $this->email = $subscriberItem->email;
                $this->signature = $subscriberItem->legal_entity_signature;

                $this->currency = $paymentItem->currency;
                $this->unit_price = $paymentItem->company->khr_price;
                $this->quantity = $paymentItem->quantity;
                $this->amount = $paymentItem->amount;
                $this->actual_deposit = $paymentItem->actual_deposit;
                $this->payment_method = $paymentItem->payment_method_id;
                $this->refund_method = $paymentItem->refund_method_id;
                $this->cheque_number = $paymentItem->cheque_number;
                $this->bank_name = $paymentItem->bank_name;
                $this->bank_acc_name = $paymentItem->bank_account_name;
                $this->bank_acc_number = $paymentItem->bank_account_number;
                $this->bank_acc_currency = $paymentItem->bank_account_currency;
                $this->payment_attach = $paymentItem->file;
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
        $this->signature = "";
    }

    public function render()
    {
        $this->company = Company::latest()->first();
        $this->payment_method_tbl = PaymentMethod::all();
        $this->refund_method_tbl = RefundMethod::all();
        $this->payment_tbl = Payment::latest()->first();

        if (Session::has('subscriberId')) {
            $subscriber = Session::get('subscriberId');
            $this->subscriberItem = Subscriber::where('id', $subscriber)->first();
        }
        return view('livewire.pages.subscription.edit')->layout('layouts.app', ['pageTitle' => 'Edit subscription']);
    }
}
