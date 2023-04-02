<?php

namespace App\Filament\Resources\SubscriberResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Contracts\HasRelationshipTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('comment')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('comment'),
                BadgeColumn::make('subscriber_status')
                    ->colors([
                        'secondary' => static fn ($state): bool => $state === 'new',
                        'warning' => static fn ($state): bool => $state === 'edited',
                        'danger' => static fn ($state): bool => $state === 'rejected',
                        'success' => static fn ($state): bool => $state === 'approved',
                    ]),
                Tables\Columns\TextColumn::make('user.name')->label('Comment by'),
                Tables\Columns\TextColumn::make('created_at')->date('Y-m-d'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->using(function (HasRelationshipTable $livewire, array $data): Model {

                    return $livewire->getRelationship()->create([
                        'subscriber_id' => $livewire->ownerRecord->id,
                        'comment' => $data['comment'],
                        'subscriber_status' => $livewire->ownerRecord->status,
                        'user_id' => auth()->id(),
                    ]);
                }),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
