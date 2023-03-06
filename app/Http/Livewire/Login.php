<?php

namespace App\Http\Livewire;

use App\Models\Register;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{

    public $error = "";
    public $email = "";
    public $password = "";

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function handleSubmit()
    {
        $user = Register::where('email', '=', $this->email)->first();
        if ($user) {

            if (Hash::check($this->password, $user->password)) {
                session()->put('loginId', $user->id);
                return redirect('/');
            } else {
                return $this->error = 'User not found';
            }
        } else {
            return $this->error = 'Email & password not found';
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
