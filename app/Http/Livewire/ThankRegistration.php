<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ThankRegistration extends Component
{
    public function render()
    {
        return view('livewire.thank-registration')->layout('layouts.app', ['pageTitle' => 'Completed registration']);
    }
}
