<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use App\Models\Subscriber;
use Livewire\Component;

use \Mpdf\Mpdf as PDF;

class AdminPdfPreview extends Component
{
    public $payment;
    public $subscriber;

    public function mount($id)
    {
        if ($id) {
            $this->payment = Payment::findOrFail($id);
            $this->subscriber = Subscriber::findOrFail($this->payment->subscriber_id);
        }
    }
    public function render()
    {
        $data = ([
            'investor_type' => $this->subscriber->investor_type,
            'khmer_trading_name' => $this->subscriber->khmer_trading_name,
            'english_trading_name' => $this->subscriber->english_trading_name,
            'trading_acc_number' => $this->subscriber->trading_acc_number,
            'investor_id' => $this->subscriber->investor_id,
            'security_firm_name' => $this->subscriber->security_firm_name,
            'contact' => $this->subscriber->contact,
            'email' => $this->subscriber->email,
            'legal_entity_signature' => $this->subscriber->legal_entity_signature,
            'currency' => $this->payment->currency,
            'unit_price' => $this->payment->company->khr_price,
            'quantity' => $this->payment->quantity,
            'amount' => $this->payment->company->amount,
            'actual_deposit' => $this->payment->actual_deposit,
            'payment_method_id' => $this->payment->payment_method_id,
            'refund_method_id' => $this->payment->refund_method_id,
            'cheque_number' => $this->payment->cheque_number,
            'bank_name' => $this->payment->bank_name,
            'bank_account_name' => $this->payment->bank_account_name,
            'bank_account_number' => $this->payment->bank_account_number,
            'bank_account_currency' => $this->payment->bank_account_currency,
            'file' => $this->payment->file,
            'date' => $this->payment->created_at,
            'user_id' => 'Vichet Tep'
        ]);

        $document = new PDF([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '10',
            'margin_bottom' => '10',
            'margin_footer' => '2',
        ]);

        // $header = [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
        // ];
        $footer = '
        <table>
            <tr>
                <td style="text-align: right; font-size:9px; padding-right:4px; border-top: 1px solid #333;">ពាក្យស្នើសុំធ្វើបរិវិសកម្មមូលបត្រកម្មសិទ្ធិ
                    <span class="text-primary"> / Subscription Form for IPO</span>
                </td>
                <td style="width: 32px; height:32px; text-align: center; border:1px solid #333;">
                {PAGENO}
                </td>
            </tr>
        </table>
        ';

        $documentFileName = $documentFileName =  date('Y-m-d') . '-' . $this->subscriber->english_trading_name;
        $document->SetHTMLFooter($footer);
        $document->setTitle($documentFileName);
        $view = view('livewire.admin-pdf-preview', compact('data'));
        $document->WriteHTML($view);
        return $document->Output($documentFileName, 'I');
    }
}
