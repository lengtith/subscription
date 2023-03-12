<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CompleteSubscription extends Component
{
    public $subscriber;
    public function handleEdit(){
        return redirect()->route('subscription.edit', [
            'id' => $this->subscriber->id,
        ]);
    }

    public function gotoForm(){
        return redirect('/form');
    }
    public function mount(){
        if (Session::has('subscriberId')) {
            $this->subscriber = Subscriber::where('id', Session::get('subscriberId'))->first();
            return $this->subscriber;
        }
    }
    public function render()
    {
        return view('livewire.complete-subscription');
    }
}
