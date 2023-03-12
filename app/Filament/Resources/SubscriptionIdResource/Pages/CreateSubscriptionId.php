<?php

namespace App\Filament\Resources\SubscriptionIdResource\Pages;

use App\Filament\Resources\SubscriptionIdResource;
use App\Mail\SendSubscriptionId;
use App\Models\Subscriber;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class CreateSubscriptionId extends CreateRecord
{
    protected static string $resource = SubscriptionIdResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        if ($data['status'] == true) {
            $subscriber = Subscriber::findOrFail($data['subscriber_id']);
            $mail = ([
                'name' => $subscriber['name'],
                'email' => $subscriber['email'],
                'code' => $data['code'],
            ]);
            Mail::to($subscriber['email'])->send(new SendSubscriptionId($mail));
        }


        return static::getModel()::create($data);
    }
}
