<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'task',
        'note',
        'date',
        'priority',
        'status',
    ];
    public function getPriorityLabelAttribute()
        {
            return ucfirst($this->priority);
        }

    public function getPriorityAttribute($value)
        {
            return match ($value) {
                'high' => 3,
                'medium' => 2,
                'low' => 1,
                default => 0
            };
        }
}

