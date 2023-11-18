<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Plan;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = [
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'admin' => 1,
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }

        $sites = [
            [
                'title' => str_replace(' ', '', 'Mehrab Mousavi'),
                'url' => 'https://mehrabmousavi.ir',
                'user_id' => 1,
            ],
            [
                'title' => str_replace(' ', '', 'Mehrab Mousavi'),
                'url' => 'https://mehrabmousavi.ir',
                'user_id' => 2,
            ],
        ];
        foreach ($sites as $site) {
            Site::create($site);
        }

        $plans = [
            [
                'title' => 'Free',
                'description' => 'plan description 1',
                'price' => 0,
                'type' => 'Monthly'
            ],
            [
                'title' => 'Plus',
                'description' => 'plan description 2',
                'price' => 120000,
                'type' => 'Monthly'
            ],
            [
                'title' => 'Pro',
                'description' => 'plan description 3',
                'price' => 12000000,
                'type' => 'Monthly'
            ],
            [
                'title' => 'Pro Max',
                'description' => 'plan description 4',
                'price' => 12000000,
                'type' => 'Monthly'
            ],
            [
                'title' => 'Plus',
                'description' => 'plan description 2',
                'price' => 120000,
                'type' => 'Yearly'
            ],
            [
                'title' => 'Pro',
                'description' => 'plan description 3',
                'price' => 12000000,
                'type' => 'Yearly'
            ],
            [
                'title' => 'Pro Max',
                'description' => 'plan description 4',
                'price' => 12000000,
                'type' => 'Yearly'
            ]
        ];
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
