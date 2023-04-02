<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Models\Company;
use Carbon\Carbon;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    protected static ?string $navigationGroup = 'Configuration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('short_name')->required(),
                    TextInput::make('khr_price')->required(),
                    TextInput::make('usd_price')->required(),
                    DatePicker::make('start_date')->required(),
                    DatePicker::make('close_date')->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('short_name'),
                TextColumn::make('khr_price'),
                TextColumn::make('usd_price'),
                TextColumn::make('start_date'),
                TextColumn::make('close_date'),
                BadgeColumn::make('Status')
                    ->getStateUsing(function (Company $record): ?string {
                        $current_date = Carbon::now()->format('Y-m-d');
                        if ($record->close_date < $current_date || $record->start_date > $current_date) {
                            return "Inactived";
                        } else {
                            return "Actived";
                        }
                    })->color(
                        function (Company $record): ?string {
                            $current_date = Carbon::now()->format('Y-m-d');
                            if ($record->close_date < $current_date || $record->start_date > $current_date) {
                                return "danger";
                            } else {
                                return "success";
                            }
                        }
                    ),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
