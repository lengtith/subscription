<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ThankSubscription extends Component
{
    public $subscriber;
    public $payment;

    public function preview()
    {
        $payment = Payment::where('subscriber_id', $this->subscriber->id)->first();

        return redirect()->route('preview', [
            'id' => $payment->id,
        ]);
    }

    public function handleEdit()
    {
        return redirect()->route('subscription.edit', ['id' => $this->subscriber->id]);
    }

    public function gotoForm()
    {
        return redirect('/form');
    }

    public function mount()
    {
        if (Session::has('loginId')) {
            $this->subscriber = Subscriber::where('register_id', Session::get('loginId'))->first();
            
            $this->payment = Payment::where('subscriber_id', $this->subscriber->id)->first();
        }
    }

    public function render()
    {
        return view('livewire.thank-subscription')->layout('layouts.app', ['pageTitle' => 'Completed']);
    }
}
