<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'team_id', 'user_id'];

    public function signatures()
    {
        return $this->hasMany(Signature::class);
    }
}
