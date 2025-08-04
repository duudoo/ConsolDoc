<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Folder;

class FolderSeeder extends Seeder
{
    public function run(): void
    {
        Folder::create([
            'name' => 'General',
            'user_id' => 1
        ]);
    }
}
