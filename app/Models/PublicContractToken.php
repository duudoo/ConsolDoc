<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PublicContractToken extends Model
{
    protected $fillable = ['contract_id', 'token'];
    public $timestamps = false;

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }
}