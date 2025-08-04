<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Notifications\SampleNotification;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        foreach (User::all() as $user) {
            $user->notify(new SampleNotification());
        }
    }
}
