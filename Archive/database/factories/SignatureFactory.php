<?php

namespace Database\Factories;

use App\Models\Signature;
use Illuminate\Database\Eloquent\Factories\Factory;

class SignatureFactory extends Factory
{
    protected \$model = Signature::class;

    public function definition(): array
    {
        return [
            'signature_data' => 'data:image/png;base64,' . base64_encode('sample'),
            'signed_at' => now(),
        ];
    }
}
