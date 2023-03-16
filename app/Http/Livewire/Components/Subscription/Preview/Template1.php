<?php

namespace App\Http\Livewire\Components\Subscription\Preview;

use Livewire\Component;

use \Mpdf\Mpdf as PDF;

class Template1 extends Component
{
    public $investorType;
    public $khmerTrading;
    public $englishTrading;
    public $tradingAccNumber;
    public $investorId;
    public $securityFirm;
    public $contact;
    public $email;
    public $currency;
    public $unitPrice;
    public $quantity;
    public $amount;
    public $actualDeposit;
    public $paymentMethod;
    public $refundMethod;
    public $chequeNumber;
    public $bankName;
    public $bankAccName;
    public $bankAccNumber;
    public $bankAccCurrency;

    public function mount($investorType,$khmerTrading,$englishTrading,$tradingAccNumber,$investorId,$securityFirm,$contact,$email,$currency,$unitPrice,$quantity,$actualDeposit,$paymentMethod,$refundMethod,$chequeNumber,$bankName,$bankAccName,$bankAccNumber,$bankAccCurrency)
    {

        $this->investorType = $investorType;
        $this->khmerTrading = $khmerTrading;
        $this->englishTrading = $englishTrading;
        $this->tradingAccNumber = $tradingAccNumber;
        $this->investorId = $investorId;
        $this->securityFirm = $securityFirm;
        $this->contact = $contact;
        $this->email = $email;
        $this->currency = $currency;
        $this->unitPrice = $unitPrice;
        $this->quantity = $quantity;
        $this->amount = $unitPrice*$quantity;
        $this->actualDeposit = $actualDeposit;
        $this->paymentMethod = $paymentMethod;
        $this->refundMethod = $refundMethod;
        $this->chequeNumber = $chequeNumber;
        $this->bankName = $bankName;
        $this->bankAccName = $bankAccName;
        $this->bankAccNumber = $bankAccNumber;
        $this->bankAccCurrency = $bankAccCurrency;
    }

    public function render()
    {
        $data = ([
            'investor_type' => $this->investorType,
            'khmer_trading_name' => $this->khmerTrading,
            'english_trading_name' => $this->englishTrading,
            'trading_acc_number' => $this->tradingAccNumber,
            'investor_id' => $this->investorId,
            'security_firm_name' => $this->securityFirm,
            'contact' => $this->contact,
            'email' => $this->email,
            'currency' => $this->currency,
            'unit_price' => $this->unitPrice,
            'quantity' => $this->quantity,
            'amount' => $this->amount,
            'actual_deposit' => $this->actualDeposit,
            'payment_method_id' => $this->paymentMethod,
            'refund_method_id' => $this->refundMethod,
            'cheque_number' => $this->chequeNumber,
            'bank_name' => $this->bankName,
            'bank_account_name' => $this->bankAccName,
            'bank_account_number' => $this->bankAccNumber,
            'bank_account_currency' => $this->bankAccCurrency,
        ]);

        // Setup a filename 
        $documentFileName = "fun.pdf";

        // Create the mPDF document
        $document = new PDF([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '10',
            'margin_bottom' => '10',
            'margin_footer' => '2',
        ]);

        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
        ];

        $view = view('livewire.components.subscription.preview.template1', compact('data'));
        $document->WriteHTML($view);
        return $document->Output();
    }
}
