<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = ['name', 'team_id'];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}