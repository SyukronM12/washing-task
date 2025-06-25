<?php

namespace App\Enums;

enum WashingStatus: string
{
    case PENDING = 'pending';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::COMPLETED => 'Completed',
        };
    }
}
