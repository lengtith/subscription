<?php

namespace App\Filament\Resources\SubscriberResource\Pages;

use App\Filament\Resources\SubscriberResource;
use App\Mail\SendComment;
use App\Mail\SendRejected;
use App\Models\Comment;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
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
                'subscriber_status' => $data['status'],
                'user_id' => auth()->id(),
            ]);

            if ($data['status'] == 'edited') {
                $mail = ([
                    'id' => $data['id'],
                    'name' => $data['english_trading_name'],
                    'email' => $data['email'],
                    'comment' => $data['comment'],
                ]);
                Mail::to($mail['email'])->send(new SendComment($mail));
            }
            if ($data['status'] == 'rejected') {
                $mail = ([
                    'id' => $data['id'],
                    'name' => $data['english_trading_name'],
                    'email' => $data['email'],
                    'comment' => $data['comment'],
                ]);
                Mail::to($mail['email'])->send(new SendRejected($mail));
            }
        }

        return $record;
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Subscriber updated';
    }
}
