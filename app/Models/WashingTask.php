<?php

namespace App\Models;

use App\Enums\WashingStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WashingTask extends Task
{
    protected $fillable = [
        'car_id',
        'task_date',
        'status',
        'interior_clean_before',
        'interior_clean_after',
        'notes'
    ];

    protected $casts = [
        'task_date' => 'date',
        'interior_clean_before' => 'boolean',
        'interior_clean_after' => 'boolean',
        'status' => WashingStatus::class,
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function isComplete(): bool
    {
        return $this->status === WashingStatus::COMPLETED;
    }

    public function markAsComplete(array $data = []): void
    {
        $this->update(array_merge($data, [
            'status' => WashingStatus::COMPLETED,
        ]));
    }
}
