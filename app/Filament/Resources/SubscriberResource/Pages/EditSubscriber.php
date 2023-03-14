<?php

namespace App\Filament\Resources\SubscriberResource\Pages;

use App\Filament\Resources\SubscriberResource;
use App\Mail\completeRegistration;
use App\Mail\SendComment;
use App\Mail\SendPassword;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Register;
use App\Models\Subscriber;
use Filament\Pages\Actions\Action;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EditSubscriber extends EditRecord
{
    protected static string $resource = SubscriberResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        if ($data['comment']) {
            
            Comment::create([
                'subscriber_id' => $data['id'],
                'comment' => $data['comment'],
                'user_id' => auth()->id(),
            ]);

            if ($data['status'] == 'edited' || $data['status'] == 'rejected') {
                $mail = ([
                    'name' => $data['english_trading_name'],
                    'email' => $data['email'],
                    'comment' => $data['comment'],
                ]);
                Mail::to($mail['email'])->send(new SendComment($mail));
            }
        }

        return $record;
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Subscriber updated';
    }
}
