<?php

namespace App\Http\Livewire;

use App\Models\Register;
use App\Models\Subscriber;
use App\Models\SubscriptionId;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

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

        $register = Register::where('email', '=', $this->email)->first();
        if ($register) {
            if (Hash::check($this->password, $register->password)) {
                session()->put('loginId', $register->id);

                $subscriber = Subscriber::where('register_id', $register->id)->first();

                if ($subscriber) {
                    session()->put('subscriberId', $subscriber->id);
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
            } else {
                return session()->flash('error', 'User not found');
            }
        } else {
            return session()->flash('error', 'Email & password not found');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
