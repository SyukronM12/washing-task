<?php

namespace App\Filament\Resources\WashingTaskResource\Pages;

use Filament\Actions;
use Illuminate\Http\RedirectResponse;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\WashingTaskResource;

class EditWashingTask extends EditRecord
{
    protected static string $resource = WashingTaskResource::class;

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
