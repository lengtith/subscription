<?php

namespace App\Http\Livewire\Components\Subscription;

use App\Models\Company;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\RefundMethod;
use App\Models\Subscriber;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;

class Approve extends Component
{
    use WithFileUploads;
    public $error;


    /**
     * @var Table
     */
    public $company;
    public $payment_method_tbl;
    public $refund_method_tbl;
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
    public $payment_method;
    public $refund_method;
    public $payment_attach;
    public $cheque_number;
    public $bank_name;
    public $bank_acc_name;
    public $bank_acc_number;
    public $bank_acc_currency;

    protected $rules = [
        'payment_method' => 'required',
        'refund_method' => 'required',
        'quantity' => 'required',
        'actual_deposit' => 'required',
        'payment_attach' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function handleSubmit()
    {
        $subscriberId = Session::get('subscriberId');
        $this->validate();

        if ($this->currency == 'KHR') {
            try {
                Payment::create([
                    'subscriber_id' => $subscriberId,
                    'currency' => $this->currency,
                    'unit_price' => $this->company->khr_price,
                    'quantity' => $this->quantity,
                    'amount' => $this->company->khr_price * $this->quantity,
                    'actual_deposit' => $this->actual_deposit,
                    'company_id' => $this->company->id,
                    'payment_method_id' => $this->payment_method,
                    'refund_method_id' => $this->refund_method,
                    'cheque_number' => $this->cheque_number,
                    'bank_name' => $this->bank_name,
                    'bank_account_name' => $this->bank_acc_name,
                    'bank_account_number' => $this->bank_acc_number,
                    'bank_account_currency' => $this->bank_acc_currency,
                    'file' => $this->payment_attach->store('', 'public'),
                ]);
                return redirect('/complete_subscription');
            } catch (\Throwable $th) {
                session()->flash('error', $th);
            }
        } else {
            try {
                Payment::create([
                    'subscriber_id' => $subscriberId,
                    'currency' => $this->currency,
                    'unit_price' => $this->company->usd_price,
                    'quantity' => $this->quantity,
                    'amount' => $this->company->usd_price * $this->quantity,
                    'actual_deposit' => $this->actual_deposit,
                    'company_id' => $this->company->id,
                    'payment_method_id' => $this->payment_method,
                    'refund_method_id' => $this->refund_method,
                    'cheque_number' => $this->cheque_number,
                    'bank_name' => $this->bank_name,
                    'bank_account_name' => $this->bank_acc_name,
                    'bank_account_number' => $this->bank_acc_number,
                    'bank_account_currency' => $this->bank_acc_currency,
                    'file' => $this->payment_attach->store('', 'public'),
                ]);
                return redirect('/complete_subscription');
            } catch (\Throwable $th) {
                session()->flash('error', $th);
            }
        }
    }

    public function handlePreview()
    {

        // $data = ([
        //     'name' => 'test',
        // ]);

        // return redirect()->to('https://www.example.com')->with('_blank');
        // return redirect()->route('preview', [
        //     'data' => $data,
        // ]);
    }

    public function mount()
    {
        if (Session::has('subscriberId')) {
            $subscriberId = Session::get('subscriberId');
            $subscriberItem = Subscriber::where('id', $subscriberId)->first();
            if ($subscriberItem->status == 'approved') {
                $this->investor_type = $subscriberItem->investor_type;
                $this->khmer_trading_name = $subscriberItem->khmer_trading_name;
                $this->english_trading_name = $subscriberItem->english_trading_name;
                $this->trading_acc_number = $subscriberItem->trading_acc_number;
                $this->investor_id = $subscriberItem->investor_id;
                $this->security_firm_name = $subscriberItem->security_firm_name;
                $this->contact = $subscriberItem->contact;
                $this->email = $subscriberItem->email;
                $this->file = $subscriberItem->legal_entity_signature;
            }
        }
    }

    public function render()
    {
        $this->company = Company::latest()->first();
        $this->payment_method_tbl = PaymentMethod::all();
        $this->refund_method_tbl = RefundMethod::all();

        return view('livewire.components.subscription.approve');
    }
}
