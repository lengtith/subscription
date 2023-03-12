<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Index extends Component
{
    public function create()
    {
        $registerId = Session::get('subscriberId');
        $subscriber = Subscriber::where('register_id', $registerId)->first();

        if ($subscriber) {
            if ($subscriber->status == 'edited') {
                return redirect()->route('subscription.edit', [
                    'id' => $subscriber->id,
                ]);
            } else {
                return redirect('/form');
            }
        } else {
            return redirect('/create');
        }
    }
    public function render()
    {
        return view('livewire.index');
    }
}
