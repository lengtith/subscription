<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class ThankRegistration extends Component
{
    public function render()
    {
        return view('livewire.pages.thank-registration')->layout('layouts.app', ['pageTitle' => 'Completed registration']);
    }
}
