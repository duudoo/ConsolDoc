<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AuditLog;

class AuditLogSeeder extends Seeder
{
    public function run(): void
    {
        AuditLog::create([
            'user_id' => 1,
            'action' => 'Initial test seed'
        ]);
    }
}
