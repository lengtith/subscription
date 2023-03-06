<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Navbar extends Component
{
    public function logout()
    {
        if (Session::has('loginId')) {
            session()->forget('loginId');
            return redirect('/login');
        }
    }
    
    public function render()
    {
        return view('livewire.components.navbar');
    }
}
