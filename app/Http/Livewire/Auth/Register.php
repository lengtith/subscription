<?php

namespace App\Http\Livewire\Auth;

use App\Mail\SendPassword;
use App\Models\Register as ModelsRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $error;

    protected $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:registers',
        'password' => 'required|min:8',
    ];

    public function handleSubmit()
    {
        $this->validate();
        try {

            $data = ([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
            ]);

            $mail = Mail::to($this->email)->send(new SendPassword($data));

            if ($mail) {
                ModelsRegister::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                ]);
                return redirect('/complete_registration');
            } else {
                return session()->flash('error', 'Something went wrong');
            }
        } catch (\Throwable $th) {
            return session()->flash('error', 'Mail server error');
        }
    }

    public function mount()
    {
        $this->password = Str::random(8);
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.app', ['pageTitle' => 'Register']);
    }
}
