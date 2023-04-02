<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefundMethodResource\Pages;
use App\Filament\Resources\RefundMethodResource\Pages\ManageRefundMethods;
use App\Models\RefundMethod;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;

class RefundMethodResource extends Resource
{
    protected static ?string $model = RefundMethod::class;

    protected static ?string $navigationIcon = 'heroicon-o-refresh';

    protected static ?string $navigationGroup = 'Configuration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([
                    Card::make()->schema([
                        TextInput::make('name')->required(),
                        Textarea::make('description'),
                    ])->columnSpan(2),
                    Section::make('Status')
                        ->schema([
                            Toggle::make('status')
                                ->label('Actived')
                                ->default(true),
                            Forms\Components\Placeholder::make('created_at')
                                ->hidden(fn (Page $livewire) => ($livewire instanceof ManageRefundMethods))
                                ->label('Created at')
                                ->content(fn (RefundMethod $record): ?string => $record->created_at?->diffForHumans()),
                        ])->columnSpan(1)
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                BadgeColumn::make('status')
                    ->enum([
                        1 => 'Actived',
                        0 => 'Inactive',
                    ])
                    ->colors([
                        'success' => static fn ($state): bool => $state === 1,
                        'danger' => static fn ($state): bool => $state === 0,
                    ]),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageRefundMethods::route('/'),
        ];
    }
}
