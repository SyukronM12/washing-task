<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FleetResource\Pages;
use App\Models\Asset\Fleet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class FleetResource extends Resource
{
    protected static ?string $model = Fleet::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'Assets';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Fleet Name')
                    ->required(),

                Forms\Components\TextInput::make('plate_number')
                    ->label('Plate Number')
                    ->required(),

                Forms\Components\TextInput::make('year')
                    ->numeric()
                    ->minValue(1990)
                    ->maxValue(now()->year + 1)
                    ->label('Year'),

                Forms\Components\Repeater::make('features')
                    ->label('Features')
                    ->schema([
                        Forms\Components\TextInput::make('value')
                            ->label('Feature')
                            ->required(),
                    ])
                    ->columns(1)
                    ->addActionLabel('Add Feature')
                    ->default([]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('plate_number')
                    ->label('Plate'),

                Tables\Columns\TextColumn::make('year'),

                Tables\Columns\TextColumn::make('features')
                    ->label('Features')
                    ->getStateUsing(fn($record) => collect($record->features)->pluck('value')->implode(', '))
                    ->color('info')
                    ->badge(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFleets::route('/'),
            'create' => Pages\CreateFleet::route('/create'),
            'edit' => Pages\EditFleet::route('/{record}/edit'),
        ];
    }

    // optional: batasi tenant jika pakai multi-tenant
    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()
    //         ->where('tenant_id', auth()->user()->tenant_id);
    // }
}
