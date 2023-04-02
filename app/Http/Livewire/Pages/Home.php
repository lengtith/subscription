<?php

namespace App\Http\Livewire\Pages;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Home extends Component
{
    public function create()
    {
        $registerId = Session::get('loginId');
        $subscriber = Subscriber::where('register_id', $registerId)->first();

        if ($subscriber) {
            return redirect('/complete_subscription');
        } else {
            return redirect('/create');
        }
    }
    
    public function render()
    {
        return view('livewire.pages.home')->layout('layouts.app', ['pageTitle' => 'Welcome to SBI Subscription']);
    }
}
