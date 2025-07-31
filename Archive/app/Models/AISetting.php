<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AISetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'openai_api_key',
        'claude_api_key',
    ];
}
