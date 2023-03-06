<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Purchase;
use App\Models\RefundMethod;
use App\Models\Subscriber;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\TemporaryUploadedFile;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Main Menu';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('subscriber_id')
                ->options(Subscriber::all()->pluck('english_name', 'id'))
                ->searchable(),
                TextInput::make('unit_price'),
                TextInput::make('quantity'),
                Radio::make('payment_method_id')
                ->options(PaymentMethod::all()->pluck('name', 'id')),
                Radio::make('refund_method_id')
                ->options(RefundMethod::all()->pluck('name', 'id')),
                TextInput::make('bank_name'),
                TextInput::make('bank_account_name'),
                TextInput::make('bank_account_number'),
                TextInput::make('bank_account_currency'),
                TextInput::make('autual_deposit')->numeric(),
                FileUpload::make('file')
                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                    $fileName = $file->hashName();
                    $name = explode('.',$fileName);
                    return (string) str('images/payment_image/'.$name[0].'png'); 
                })
                ->label('Image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
