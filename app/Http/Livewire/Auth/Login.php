<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\Register;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $email = "";
    public $password = "";

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8'
    ];

    public function handleSubmit()
    {
        $this->validate();

        $register = Register::where('email', '=', $this->email)->first();
        if ($register) {
            if (Hash::check($this->password, $register->password)) {
                session()->put('loginId', $register->id);

                $subscriber = Subscriber::where('register_id', $register->id)->first();

                if ($subscriber != null) {

                    if ($subscriber->status == 'approved') {
                        return redirect('/form');
                    } else {
                        return redirect('/complete_subscription');
                    }
                } else {
                    return redirect('/create');
                }
            } else {
                return session()->flash('error', 'User not found');
            }
        } else {
            return session()->flash('error', 'Email & password not found');
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app', ['pageTitle' => 'Login']);
    }
}
