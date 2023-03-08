<?php

namespace App\Http\Livewire;

use App\Mail\completeRegistration;
use App\Models\Register as ModelsRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $error;

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:registers',
        'password' => 'required|max:8',
    ];

    public function handleSubmit()
    {
        $this->validate();


        $res = ModelsRegister::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $data = ([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        if ($res) {
            session()->flash('success', 'Your registration has been successfully registered');
            Mail::to($this->email)->send(new completeRegistration($data));
            return redirect('/complete_registration');
        } else {
            return $this->error = 'Something went wrong';
        }
    }

    public function mount()
    {
        $this->password = Str::random(8);
    }

    public function render()
    {
        return view('livewire.register');
    }
}
