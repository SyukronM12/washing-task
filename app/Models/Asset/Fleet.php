<?php

namespace App\Models\Asset;

use App\Models\WashingTask;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fleet extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'tenant_id',
        'rental_id',
        'name',
        'plate_number',
        'year',
        'features',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($fleet) {
            if (!$fleet->id) {
                $fleet->id = (string) Str::uuid();
            }
        });
    }

    public function washingTasks()
    {
        return $this->hasMany(WashingTask::class);
    }
}
