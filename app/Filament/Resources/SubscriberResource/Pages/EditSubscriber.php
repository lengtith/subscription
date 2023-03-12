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

        // $item = Subscriber::where('id', $data['id'])->update([
        //     'investor_type' => $data['investor_type'],
        //     'khmer_trading_name' => $data['khmer_trading_name'],
        //     'english_trading_name' => $data['english_trading_name'],
        //     'trading_acc_number' => $data['trading_acc_number'],
        //     'investor_id' => $data['investor_id'],
        //     'security_firm_name' => $data['security_firm_name'],
        //     'contact' => $data['contact'],
        //     'email' => $data['email'],
        //     'legal_entity_signature' => $data['legal_entity_signature'],
        //     'status' => $data['status'],
        //     'user_id' => auth()->id(),
        // ]);

        if ($data['comment']) {
            
            Comment::create([
                'subscriber_id' => $data['id'],
                'comment' => $data['comment'],
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
