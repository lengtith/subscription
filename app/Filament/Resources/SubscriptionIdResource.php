<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionIdResource\Pages;
use App\Filament\Resources\SubscriptionIdResource\Pages\CreateSubscriptionId;
use App\Filament\Resources\SubscriptionIdResource\RelationManagers;
use App\Filament\Resources\SubscriptionIdResource\RelationManagers\SubscribersRelationManager;
use App\Models\Company;
use App\Models\Subscriber;
use App\Models\SubscriptionId;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubscriptionIdResource extends Resource
{
    protected static ?string $model = SubscriptionId::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationGroup = 'Main Menu';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([
                    Card::make()->schema([

                        Select::make('subscriber_id')
                            ->label('Subscriber Name')
                            ->options(Subscriber::all()->pluck('english_trading_name', 'id'))
                            ->searchable(),
                        Select::make('company_id')
                            ->label('Company Name')
                            ->options(Company::all()->pluck('name', 'id'))
                            ->searchable(),
                        TextInput::make('code')->unique(),
                    ])->columnSpan(2),
                    Section::make('Status')->schema([
                        Toggle::make('status')
                    ])->hidden(fn (Page $livewire) => ($livewire instanceof CreateSubscriptionId))->columnSpan(1),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subscriber.english_trading_name'),
                TextColumn::make('company.name'),
                TextColumn::make('code'),
                BadgeColumn::make('status')
                    ->colors([
                        'danger' => static fn ($state): bool => $state === 0,
                        'success' => static fn ($state): bool => $state === 1,
                    ])
                    ->enum([
                        0 => 'Inactive',
                        1 => 'Actived',
                    ]),
                BadgeColumn::make('is_sent')->label('Email Sending')
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscriptionIds::route('/'),
            'create' => Pages\CreateSubscriptionId::route('/create'),
            'edit' => Pages\EditSubscriptionId::route('/{record}/edit'),
        ];
    }
}
