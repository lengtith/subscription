<?php

namespace App\Filament\Resources\SubscriberResource\RelationManagers;

use App\Mail\SendReceipt;
use App\Models\Company;
use App\Models\PaymentMethod;
use App\Models\Purchase;
use App\Models\RefundMethod;
use App\Models\Subscriber;
use Carbon\Carbon;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Contracts\HasRelationshipTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use stdClass;

class PaymentsRelationManager extends RelationManager
{
    protected static string $relationship = 'payments';

    protected static ?string $recordTitleAttribute = 'currency';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([
                    Grid::make()->schema([
                        Card::make()->schema([
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
                                ->columnSpan(2),
                            TextInput::make('price_per_share')
                                ->label('Price per Share')
                                ->required()
                                ->disabled()
                                ->reactive()
                                ->afterStateUpdated(function (Closure $set, Closure $get) {
                                    if (!($get('price_per_share') == null)) {
                                        $set('amount', 0);
                                    } else {
                                        $set('amount', $get('total_share') * $get('price_per_share'));
                                    }
                                }),
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
                                ->required(),

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
                                ->required(),
                            TextInput::make('bank_name'),
                            TextInput::make('bank_account_name'),
                            TextInput::make('bank_account_number'),
                            TextInput::make('bank_account_currency'),
                        ]),
                    ])->columnSpan(2),
                    Section::make('Status')->schema([
                        Toggle::make('status'),
                    ])->columnSpan(1)
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('NO')
                    ->getStateUsing(
                        static function (stdClass $rowLoop, HasTable $livewire): string {
                            return (string) ($rowLoop->iteration +
                                ($livewire->tableRecordsPerPage * ($livewire->page - 1
                                ))
                            );
                        }
                    ),
                Tables\Columns\TextColumn::make('purchase.company.name')->label('Company Name'),
                Tables\Columns\TextColumn::make('purchase.price_per_share')->label('Price Per Share'),
                Tables\Columns\TextColumn::make('purchase.total_share')->label('Total Share'),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('created_at')->date('Y-M-d'),
                Tables\Columns\BadgeColumn::make('purchase.currency_type')
                    ->label('Currency Type')
                    ->colors([
                        'danger' => static fn ($state): bool => $state === 'USD',
                        'success' => static fn ($state): bool => $state === 'KHR',
                    ]),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => static fn ($state): bool => $state === 0,
                        'success' => static fn ($state): bool => $state === 1,
                    ])
                    ->enum([
                        0 => 'Checking',
                        1 => 'Approved',
                    ]),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->using(function (HasRelationshipTable $livewire, array $data): Model {
                        $current_date = Carbon::now()->format('Y-m-d');
                        $company = Company::where('close_date', '>=', $current_date)->first();
                        $purchase = Purchase::create([
                            'subscriber_id' => $livewire->ownerRecord->id,
                            'currency_type' => $data['currency_type'],
                            'price_per_share' => $data['price_per_share'],
                            'total_share' => $data['total_share'],
                            'actual_deposit' => $data['actual_deposit'],
                            'company_id' => $company->id,
                            'payment_method_id' => $data['payment_method_id'],
                            'refund_method_id' => $data['refund_method_id'],
                            'cheque_number' => $data['cheque_number'],
                            'bank_name' => $data['bank_name'],
                            'bank_account_name' => $data['bank_account_name'],
                            'bank_account_number' => $data['bank_account_number'],
                            'bank_account_currency' => $data['bank_account_currency'],
                            'payment_attach' => $data['payment_attach'],
                        ]);

                        return $livewire->getRelationship()->create([
                            'purchase_id' => $purchase->id,
                            'amount' => $data['amount'],
                        ]);
                    })
                    ->disabled(function () {
                        $current_date = Carbon::now()->format('Y-m-d');
                        $company = Company::where('close_date', '>=', $current_date)->first();
                        if ($company) {
                            return false;
                        } else {
                            return true;
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->mutateRecordDataUsing(function (array $data): array {
                        $purchase = Purchase::where('id', $data['purchase_id'])->first();
                        $data['currency_type'] = $purchase->currency_type;
                        $data['price_per_share'] = $purchase->price_per_share;
                        $data['total_share'] = $purchase->total_share;
                        $data['actual_deposit'] = $purchase->actual_deposit;
                        $data['payment_method_id'] = $purchase->payment_method_id;
                        $data['refund_method_id'] = $purchase->refund_method_id;
                        $data['payment_attach'] = $purchase->payment_attach;

                        return $data;
                    })
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['user_id'] = auth()->id();

                        return $data;
                    })
                    ->using(function (Model $record, array $data): Model {
                        $record->update($data);

                        Purchase::where('id', $data['purchase_id'])->update([
                            'currency_type' => $data['currency_type'],
                            'price_per_share' => $data['price_per_share'],
                            'total_share' => $data['total_share'],
                            'actual_deposit' => $data['actual_deposit'],
                            'payment_method_id' => $data['payment_method_id'],
                            'refund_method_id' => $data['refund_method_id'],
                            'payment_attach' => $data['payment_attach'],
                        ]);

                        if ($data['status'] == true) {
                            $purchase = Purchase::findOrFail($data['purchase_id']);
                            $subscriber = Subscriber::findOrFail($purchase->subscriber_id);
                            $mail = ([
                                'name' => $subscriber['name'],
                                'email' => $subscriber['email'],
                                'currency' => $data['price_per_share'],
                            ]);
                            Mail::to($mail['email'])->send(new SendReceipt($mail));
                        }

                        return $record;
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
