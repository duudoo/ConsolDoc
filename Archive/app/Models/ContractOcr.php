<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractOcr extends Model
{
    protected $fillable = [
        'contract_id',
        'page_number',
        'text_content',
        'text_blocks',
    ];

    protected $casts = [
        'text_blocks' => 'array'
    ];
}
