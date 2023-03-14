<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\Pages\CreatePayment;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Purchase;
use App\Models\RefundMethod;
use App\Models\Subscriber;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
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
                Grid::make(3)->schema([
                    Grid::make()->schema([
                        Card::make()->schema([
                            Select::make('subscriber_id')
                                ->options(Subscriber::all()->pluck('english_trading_name', 'id'))
                                ->searchable()->required()->disabled(),
                            TextInput::make('currency')->label('Currency Type')->required(),
                            TextInput::make('unit_price')->label('Price per Share')->required(),
                            TextInput::make('quantity')->label('Amount Share')->required(),

                            TextInput::make('actual_deposit')->numeric(),
                        ])->columns(2),
                        Section::make('Payment')->schema([
                            Radio::make('payment_method_id')->label('Payment Method')
                                ->options(PaymentMethod::all()->pluck('name', 'id'))->required(),
                            TextInput::make('bank_name')->hidden(fn (Payment $record) => $record->payment_method_id == 3  ? false : true),
                            FileUpload::make('file')->label('Image')
                                ->image()->enableOpen()->enableDownload()->required(),
                        ]),
                        Section::make('Refund')->schema([
                            Radio::make('refund_method_id')->label('Refund Method')
                                ->options(RefundMethod::all()->pluck('name', 'id'))->required(),
                            TextInput::make('bank_name')->hidden(fn (Payment $record) => $record->refund_method_id == 3  ? false : true),
                            TextInput::make('bank_account_name')->hidden(fn (Payment $record) => $record->refund_method_id == 3  ? false : true),
                            TextInput::make('bank_account_number')->hidden(fn (Payment $record) => $record->refund_method_id == 3  ? false : true),
                            TextInput::make('bank_account_currency')->hidden(fn (Payment $record) => $record->refund_method_id == 3  ? false : true),
                        ]),
                    ])->columnSpan(2),
                    Section::make('Status')->schema([
                        Toggle::make('status'),
                    ])->columnSpan(1)->hidden(fn (Page $livewire) => ($livewire instanceof CreatePayment))
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subscriber.khmer_trading_name')->searchable()->label('Khmer Name'),
                TextColumn::make('subscriber.english_trading_name')->searchable()->label('English Name'),
                TextColumn::make('unit_price')->label('Price per Share'),
                TextColumn::make('quantity')->label('Amount Share'),
                TextColumn::make('amount')->label('Total Amount'),
                BadgeColumn::make('currency')
                    ->colors([
                        'danger' => static fn ($state): bool => $state === 'USD',
                        'success' => static fn ($state): bool => $state === 'KHR',
                    ]),
                BadgeColumn::make('status')
                    ->colors([
                        'danger' => static fn ($state): bool => $state === 0,
                        'success' => static fn ($state): bool => $state === 1,
                    ])
                    ->enum([
                        0 => 'Inactive',
                        1 => 'Actived',
                    ]),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'edited' => 'Edited',
                        'rejected' => 'Rejected',
                        'approved' => 'Approved',
                    ]),

                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Pdf')->icon('heroicon-o-document-download')->url(fn (Payment $record) => route('pdf.download', $record))->openUrlInNewTab(),
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
