<?php

namespace App\Models;

use App\Enums\Result;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'number',
        'result',
        'win_sum',
    ];

    protected $attributes = [
        'win_sum' => 0,
    ];

    protected $casts = [
        'result' => Result::class
    ];
}
