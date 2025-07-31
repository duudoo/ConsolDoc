<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Laravel\Jetstream\Team;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Demo Admin',
            'email' => 'admin@consoldoc.com',
        ]);

        $team = Team::factory()->create([
            'user_id' => $user->id,
            'name' => 'Demo Team',
            'personal_team' => true,
        ]);

        $user->update(['current_team_id' => $team->id]);
    }
}
