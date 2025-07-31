<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contract;
use App\Models\ContractOcr;

class ContractOcrSeeder extends Seeder
{
    public function run(): void
    {
        $contract = Contract::firstOrCreate(['title' => 'Mock NDA'], [
            'team_id' => 1,
            'user_id' => 1,
            'content' => 'This is a mock contract.'
        ]);

        ContractOcr::updateOrCreate([
            'contract_id' => $contract->id,
            'page_number' => 1
        ], [
            'text_content' => "This Agreement may be terminated by either party upon thirty (30) days’ notice...\nGoverning Law: This Agreement shall be governed by the laws of California.",
            'text_blocks' => json_encode([
                ['text' => 'Termination', 'x' => 100, 'y' => 200, 'width' => 250, 'height' => 40],
                ['text' => 'Governing Law', 'x' => 80, 'y' => 300, 'width' => 230, 'height' => 35]
            ])
        ]);
    }
}
