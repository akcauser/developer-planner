<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $key
 * @property integer $value
 * @property integer $duration
 */
class Task extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'duration', 'value'];
}
