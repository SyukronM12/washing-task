<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Task\WashingTask;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\WashingTaskResource\Pages;

class WashingTaskResource extends Resource
{
    protected static ?string $model = WashingTask::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Tasks';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('fleet_id')
                ->relationship('fleet', 'name')
                ->required()
                ->searchable(),

            Forms\Components\DatePicker::make('washed_at')
                ->label('Washing Date'),
            // ->required(),

            Forms\Components\Toggle::make('is_done')
                ->label('Washed?'),

            Forms\Components\Textarea::make('notes')
                ->label('Notes')
                ->rows(3)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fleet.name')
                    ->label('Fleets')
                    ->searchable(),

                Tables\Columns\TextColumn::make('washed_at')
                    ->label('Washing Date')
                    ->getStateUsing(
                        fn($record) => $record->washed_at
                            ? \Carbon\Carbon::parse($record->washed_at)->format('d M Y')
                            : 'Not Washed'
                    )
                    ->colors([
                        'success' => fn($state) => $state !== 'Not Washed',
                        'gray' => fn($state) => $state === 'Not Washed',
                    ])
                    ->badge(),

                Tables\Columns\TextColumn::make('notes')
                    ->label('Notes')
                    ->limit(30),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Created'),

                Tables\Columns\IconColumn::make('is_done')
                    ->boolean()
                    ->label('Status')
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
            'index' => Pages\ListWashingTasks::route('/'),
            'create' => Pages\CreateWashingTask::route('/create'),
            'edit' => Pages\EditWashingTask::route('/{record}/edit'),
        ];
    }
}
