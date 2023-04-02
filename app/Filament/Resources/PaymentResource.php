<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\Pages\CreatePayment;
use App\Filament\Resources\PaymentResource\Pages\EditPayment;
use App\Models\Company;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\RefundMethod;
use App\Models\Subscriber;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
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
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

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
                                ->label('Subscriber Name')
                                ->options(Subscriber::all()
                                    ->pluck('english_trading_name', 'id'))
                                ->searchable()
                                ->required()
                                ->disabled(fn (Page $livewire) => ($livewire instanceof EditPayment)),
                            Radio::make('currency_type')
                                ->label('Currency Type')
                                ->options(
                                    [
                                        'KHR' => 'Riel',
                                        'USD' => 'Dollar',
                                    ]
                                )
                                ->reactive()
                                ->afterStateUpdated(function (Closure $set, Closure $get) {
                                    $current_date = Carbon::now()->format('Y-m-d');
                                    $company = Company::where('close_date', '>=', $current_date)->first();
                                    if ($company) {
                                        if ($get('currency_type') == 'KHR') {
                                            $set('price_per_share', $company->khr_price);
                                        } elseif ($get('currency_type') == 'USD') {
                                            $set('price_per_share', $company->usd_price);
                                        } else {
                                            $set('price_per_share', 0);
                                        }
                                    } else {
                                        $set('price_per_share', 'No Data Available');
                                    }
                                })
                                ->required()
                                ->columnSpan(2)
                                ->disabled(fn (Page $livewire) => ($livewire instanceof EditPayment)),
                            TextInput::make('price_per_share')
                                ->label('Price per Share')
                                ->required()
                                ->disabled(fn (Page $livewire) => ($livewire instanceof EditPayment)),
                            TextInput::make('total_share')
                                ->label('Total Share')
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(function (Closure $set, Closure $get) {
                                    if (!($get('total_share') == null)) {
                                        $set('amount', $get('total_share') * $get('price_per_share'));
                                    }
                                }),
                            TextInput::make('amount')
                                ->label('Amount')
                                ->required()
                                ->disabled(),

                            TextInput::make('actual_deposit')->numeric(),
                            Hidden::make('purchase_id'),
                        ])->columns(2),

                        Section::make('Payment')->schema([

                            Radio::make('payment_method_id')
                                ->label('Payment Method')
                                ->options(PaymentMethod::all()
                                    ->pluck('name', 'id'))
                                ->required(),
                            TextInput::make('cheque_number')
                                ->numeric(),
                            FileUpload::make('payment_attach')->label('Image')
                                ->image()->enableOpen()->enableDownload()->required(),
                        ]),

                        Section::make('Refund')->schema([
                            Radio::make('refund_method_id')
                                ->label('Refund Method')
                                ->options(RefundMethod::all()
                                    ->pluck('name', 'id'))
                                ->required()
                                ->columnSpan(2),
                            TextInput::make('bank_name'),
                            TextInput::make('bank_account_name'),
                            TextInput::make('bank_account_number'),
                            TextInput::make('bank_account_currency'),
                        ])->columns(2),
                    ])->columnSpan(2),
                    Section::make('Status')->schema([
                        Toggle::make('status')
                            ->label('Approved'),
                        Forms\Components\Placeholder::make('created_at')
                            ->hidden(fn (Page $livewire) => ($livewire instanceof CreatePayment))
                            ->label('Created at')
                            ->content(fn (Payment $record): ?string => $record->created_at?->diffForHumans()),
                        Forms\Components\Placeholder::make('updated_at')
                            ->hidden(fn (Page $livewire) => ($livewire instanceof CreatePayment))
                            ->label('Updated at')
                            ->content(fn (Payment $record): ?string => $record->updated_at?->diffForHumans()),
                    ])->columnSpan(1)->hidden(fn (Page $livewire) => ($livewire instanceof CreatePayment))
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('purchase.subscriber.english_trading_name')->searchable()->label('English Name'),
                TextColumn::make('purchase.company.name')->searchable()->label('Company Name'),
                TextColumn::make('purchase.price_per_share')->label('Price per Share'),
                TextColumn::make('purchase.total_share')->label('Total Share'),
                TextColumn::make('amount')->label('Total Amount'),
                BadgeColumn::make('purchase.currency_type')
                    ->label('Currency Type')
                    ->colors([
                        'danger' => static fn ($state): bool => $state === 'USD',
                        'success' => static fn ($state): bool => $state === 'KHR',
                    ]),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => static fn ($state): bool => $state === 0,
                        'success' => static fn ($state): bool => $state === 1,
                    ])
                    ->enum([
                        0 => 'Checking',
                        1 => 'Approved',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        0 => 'Checking',
                        1 => 'Approved',
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
                Tables\Actions\Action::make('Pdf')->icon('heroicon-o-document-download')->url(fn (Payment $record) => route('pdf.preview', $record->purchase_id))->openUrlInNewTab()->label('PDF'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make()
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

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', false)->count();
    }

    public static function getChequeNumberFormField(): Forms\Components\TextInput
    {
        return TextInput::make('cheque_number');
    }
}
