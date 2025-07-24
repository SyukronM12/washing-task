<?php

namespace App\Filament\Resources\WashingTaskResource\Pages;

use App\Filament\Resources\WashingTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWashingTasks extends ListRecords
{
    protected static string $resource = WashingTaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
