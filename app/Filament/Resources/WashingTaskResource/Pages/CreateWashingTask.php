<?php

namespace App\Filament\Resources\WashingTaskResource\Pages;

use App\Filament\Resources\WashingTaskResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWashingTask extends CreateRecord
{
    protected static string $resource = WashingTaskResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
