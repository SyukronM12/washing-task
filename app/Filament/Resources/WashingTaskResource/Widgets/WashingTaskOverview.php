<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Task\WashingTask;

class WashingTaskOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Task', WashingTask::count()),
            Card::make('Sudah Dicuci', WashingTask::where('is_done', true)->count()),
            Card::make('Belum Dicuci', WashingTask::where('is_done', false)->count()),
        ];
    }
}
