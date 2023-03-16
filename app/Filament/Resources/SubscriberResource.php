<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriberResource\Pages;
use App\Filament\Resources\SubscriberResource\Pages\CreateSubscriber;
use App\Filament\Resources\SubscriberResource\RelationManagers\CommentsRelationManager;
use App\Filament\Resources\SubscriberResource\RelationManagers\PaymentsRelationManager;
use App\Filament\Resources\SubscriberResource\RelationManagers\SubscriptionIdsRelationManager;
use App\Models\Subscriber;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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

class SubscriberResource extends Resource
{
    protected static ?string $model = Subscriber::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Main Menu';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([
                    Grid::make()->schema([
                        Card::make()->schema([
                            Radio::make('investor_type')
                                ->options([
                                    'individual' => 'Individual',
                                    'legal_entity' => ' Legal Entity',
                                ])->columnSpan(2),
                            TextInput::make('id')->label('ID')->disabled(),
                            TextInput::make('investor_id')->required()->numeric()->unique(ignoreRecord: true),
                            TextInput::make('trading_acc_number')->required()->numeric()->unique(ignoreRecord: true),
                            TextInput::make('khmer_trading_name')->required(),
                            TextInput::make('english_trading_name')->required(),
                            TextInput::make('security_firm_name')->required(),
                            TextInput::make('contact')->required(),
                            TextInput::make('email')->required()->email(),

                        ])->columns(2),
                        Section::make('Image')
                            ->schema([
                                FileUpload::make('legal_entity_signature')->label('Image')
                                    ->image()->enableOpen()->enableDownload(),
                            ]),
                    ])->columnSpan(2),
                    Grid::make()->schema([
                        Section::make('Status')
                            ->schema([
                                Radio::make('status')
                                    ->options([
                                        'new' => 'New',
                                        'edited' => 'Edited',
                                        'rejected' => 'Rejected',
                                        'approved' => 'Approved',
                                    ])->required(),
                                Forms\Components\Placeholder::make('created_at')
                                    ->hidden(fn (Page $livewire) => ($livewire instanceof CreateSubscriber))
                                    ->label('Created at')
                                    ->content(fn (Subscriber $record): ?string => $record->created_at?->diffForHumans()),
                            ]),
                        Section::make('Comment')
                            ->schema([
                                Textarea::make('comment')
                            ])->hidden(fn (Page $livewire) => ($livewire instanceof CreateSubscriber)),
                    ])->columnSpan(1),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('english_trading_name')->searchable(),
                TextColumn::make('khmer_trading_name')->searchable(),
                TextColumn::make('email')->searchable(),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => static fn ($state): bool => $state === 'new',
                        'primary' => static fn ($state): bool => $state === 'edited',
                        'danger' => static fn ($state): bool => $state === 'rejected',
                        'success' => static fn ($state): bool => $state === 'approved',
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
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make()
            ]);
    }

    public static function getRelations(): array
    {
        return [
            SubscriptionIdsRelationManager::class,
            PaymentsRelationManager::class,
            CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscribers::route('/'),
            'create' => Pages\CreateSubscriber::route('/create'),
            'edit' => Pages\EditSubscriber::route('/{record}/edit'),
        ];
    }

    
    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status','new')->count();
    }
}
