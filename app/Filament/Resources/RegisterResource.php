<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegisterResource\Pages;
use App\Filament\Resources\RegisterResource\Pages\CreateRegister;
use App\Filament\Resources\RegisterResource\RelationManagers;
use App\Models\Register;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegisterResource extends Resource
{
    protected static ?string $model = Register::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-add';

    protected static ?string $navigationGroup = 'Main Menu';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([
                    Card::make()->schema([
                        TextInput::make('name')
                        ->required(),
                        TextInput::make('email')
                        ->required()->unique()
                        ->placeholder('@gmail.com')
                    ])->columnSpan(2),
                    Card::make() ->schema([
                            Forms\Components\Placeholder::make('created_at')
                            ->hidden(fn (Page $livewire) => ($livewire instanceof CreateRegister))
                            ->label('Created at')
                            ->content(fn (Register $record): ?string => $record->created_at?->diffForHumans()),
                        ])
                        ->hidden(fn (Page $livewire) => ($livewire instanceof CreateRegister))
                        ->columnSpan(1)
                    ]),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('created_at')->date(),
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
            'index' => Pages\ListRegisters::route('/'),
            'create' => Pages\CreateRegister::route('/create'),
            'edit' => Pages\EditRegister::route('/{record}/edit'),
        ];
    }    
}
