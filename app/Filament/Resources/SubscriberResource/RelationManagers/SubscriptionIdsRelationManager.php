<?php

namespace App\Filament\Resources\SubscriberResource\RelationManagers;

use App\Filament\Resources\SubscriptionIdResource\Pages\CreateSubscriptionId;
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
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class SubscriptionIdsRelationManager extends RelationManager
{
    protected static string $relationship = 'subscription_ids';

    protected static ?string $recordTitleAttribute = 'code';

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
                    ])->columnSpan(1),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subscriber.english_trading_name'),
                Tables\Columns\TextColumn::make('company.name'),
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('created_at'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->using(function (array $data): Model {
                    $item = ([
                        'subscriber_id' => $data['subscriber_id'],
                        'company_id' => $data['company_id'],
                        'code' => $data['code'],
                        'status' => $data['status'],
                        'user_id' => auth()->id(),
                    ]);
                    return SubscriptionId::create($item);
                }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
