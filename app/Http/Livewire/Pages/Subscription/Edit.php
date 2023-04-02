<?php

namespace App\Http\Livewire\Pages\Subscription;

use App\Models\Comment;
use App\Models\Company;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Purchase;
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
    public $new_signature;
    public $signature_attach;
    public $subscriber_status;
    public $comment;
    public $user_id;

    /**
     * @var Payment
     */
    public $currency_type = 'KHR';
    public $price_per_share;
    public $total_share = 0;
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
    ];

    public function handleSubmit()
    {
        $this->validate();
        $record = Subscriber::where('register_id', Session::get('loginId'))->first();

        if ($this->new_signature) {
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
                    'signature_attach' => $this->new_signature->store('', 'public'),
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
                    'signature_attach' => $this->signature_attach,
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

    public function mount()
    {

        $registerId = Session::get('loginId');
        $subscriber = Subscriber::where('register_id', $registerId)->first();
        if ($subscriber->status == 'new') {
            return redirect('/complete_subscription');
        }

        $commentItem = Comment::where('subscriber_id', $subscriber->id)->get();
        $this->comment = $commentItem;

        if (Session::has('loginId')) {
            $subscriberItem = Subscriber::where('register_id', $registerId)->first();
            $purchaseItem = Purchase::where('subscriber_id', $subscriberItem->id)->first();
            $paymentItem = Payment::where('purchase_id', $purchaseItem->id)->first();

            if ($subscriberItem->status == 'edited') {
                $this->investor_type = $subscriberItem->investor_type;
                $this->khmer_trading_name = $subscriberItem->khmer_trading_name;
                $this->english_trading_name = $subscriberItem->english_trading_name;
                $this->trading_acc_number = $subscriberItem->trading_acc_number;
                $this->investor_id = $subscriberItem->investor_id;
                $this->security_firm_name = $subscriberItem->security_firm_name;
                $this->contact = $subscriberItem->contact;
                $this->email = $subscriberItem->email;

                $this->currency_type = $purchaseItem->currency_type;
                $this->price_per_share = $purchaseItem->company->khr_price;
                $this->total_share = $purchaseItem->total_share;
                $this->amount = $paymentItem->amount;
                $this->actual_deposit = $purchaseItem->actual_deposit;
                $this->payment_method = $purchaseItem->payment_method_id;
                $this->refund_method = $purchaseItem->refund_method_id;
                $this->cheque_number = $purchaseItem->cheque_number;
                $this->bank_name = $purchaseItem->bank_name;
                $this->bank_acc_name = $purchaseItem->bank_account_name;
                $this->bank_acc_number = $purchaseItem->bank_account_number;
                $this->bank_acc_currency = $purchaseItem->bank_account_currency;
                $this->payment_attach = $purchaseItem->payment_attach;
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
        $this->new_signature = "";
    }

    public function render()
    {
        $this->company = Company::latest()->first();
        $this->payment_method_tbl = PaymentMethod::all();
        $this->refund_method_tbl = RefundMethod::all();

        return view('livewire.pages.subscription.edit')->layout('layouts.app', ['pageTitle' => 'Edit subscription']);
    }
}
