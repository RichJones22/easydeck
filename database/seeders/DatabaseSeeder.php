<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->SeedGuestUsers();

//        (new PostSeeder())->run();
    }

    /**
     *
     */
    protected function SeedGuestUsers(): void
    {
        Artisan::call('migrate:refresh');

        (new User)->setRawAttributes([
            'name' => 'guest',
            'email' => 'guest@guest.com',
            'email_verified_at' => now(),
            'password' => Hash::make('guest@guest.com'),
            'remember_token' => Str::random(10)
        ])->save();

        (new User)->setRawAttributes([
            'name' => 'guest1',
            'email' => 'guest1@guest.com',
            'email_verified_at' => now(),
            'password' => Hash::make('guest1@guest.com'),
            'remember_token' => Str::random(10),
        ])->save();
    }
}
