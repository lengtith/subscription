<?php

namespace App\Http\Livewire;

use App\Models\Register as ModelsRegister;
use Illuminate\Support\Facades\Hash;
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

    public function handleSubmit(){
        $this->validate();

        $res = ModelsRegister::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        if ($res) {
            session()->flash('success','Your registration has been successfully registered');
            return redirect('/login');
        } else {
            return $this->error = 'Something went wrong';
        }
    }

    public function render()
    {
        return view('livewire.register');
    }
}
