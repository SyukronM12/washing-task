<?php

namespace App\Filament\Resources\FleetResource\Pages;

use Filament\Actions;
use Illuminate\Http\RedirectResponse;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\FleetResource;

class EditFleet extends EditRecord
{
    protected static string $resource = FleetResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\DeleteAction::make(),
    //     ];
    // }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterDelete(): RedirectResponse
    {
        return redirect($this->getResource()::getUrl('index'));
    }
}
