<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    protected $fillable = ['plate_number', 'model', 'customer_name', 'notes'];

    public function washingTasks(): HasMany
    {
        return $this->hasMany(WashingTask::class);
    }
}