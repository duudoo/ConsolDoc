<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contract;
use App\Models\User;

class ContractSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        Contract::factory()->count(2)->create([
            'user_id' => $user->id,
            'team_id' => $user->current_team_id,
        ]);
    }
}
