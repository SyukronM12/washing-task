<?php

namespace App\Models\Task;

use App\Models\Asset\Fleet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WashingTask extends Model
{
    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'id',
        'fleet_id',
        'fleet_name',
        'washed_at',
        'is_done',
        'notes'
    ];

    protected $casts = [
        'washed_at' => 'date',
        'is_done' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function fleet()
    {
        return $this->belongsTo(Fleet::class);
    }
}
