<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiKey;

class ApiKeySeeder extends Seeder
{
    public function run(): void
    {
        ApiKey::create([
            'user_id' => 1,
            'provider' => 'openai',
            'key' => 'sk-xxxxxxx',
        ]);
    }
}
