<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Signature;
use App\Models\Contract;
use App\Models\User;

class SignatureSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $contract = Contract::first();

        Signature::factory()->create([
            'contract_id' => $contract->id,
            'user_id' => $user->id,
        ]);
    }
}
