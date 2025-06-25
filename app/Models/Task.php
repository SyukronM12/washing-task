<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Task extends Model
{
    abstract public function isComplete(): bool;
    abstract public function markAsComplete(array $data = []): void;
}
