<?php

namespace App\Filament\Resources\RegisterResource\Pages;

use App\Filament\Resources\RegisterResource;
use App\Mail\SendPassword;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CreateRegister extends CreateRecord
{
    protected static string $resource = RegisterResource::class;

    public $password;


    protected function handleRecordCreation(array $data): Model
    {
        $this->password = Str::random(8);
        $data['password'] = Hash::make($this->password);
        $mail = ([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $this->password,
        ]);
        Mail::to($data['email'])->send(new SendPassword($mail));
        return static::getModel()::create($data);
    }
}
