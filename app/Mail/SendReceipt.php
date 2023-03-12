<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
use \Mpdf\Mpdf as PDF;

class SendReceipt extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Send Receipt',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.send-receipt',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        $document = new PDF([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);

        $document->WriteHTML('<h1 style="font-family:KhmerOS">ចេក</h1>');
        $documentFileName = 'test.pdf';
        // Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));



        // return $this->attach(storage_path('app/public/test.pdf'));
        return [
            // Attachment::fromPath(storage_path('app/public/test.pdf'))
            //         ->as('test.pdf')
            //         ->withMime('application/pdf'),
            Attachment::fromData(fn () => $document->Output($documentFileName, "S"), 'test.pdf')
                ->withMime('application/pdf')
        ];
    }
}
