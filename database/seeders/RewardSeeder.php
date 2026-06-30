<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $rewards = [
        ['name' => 'R10 Airtime', 'points_cost' => 100, 'description' => 'Top up any network'],
        ['name' => 'R25 Airtime', 'points_cost' => 250, 'description' => 'Top up any network'],
        ['name' => 'R50 Grocery Voucher', 'points_cost' => 500, 'description' => 'Valid at Pick n Pay'],
        ['name' => 'R100 Grocery Voucher', 'points_cost' => 1000, 'description' => 'Valid at Pick n Pay'],
        ['name' => 'R50 Fuel Voucher', 'points_cost' => 750, 'description' => 'Valid at any BP garage'],
    ];

    foreach ($rewards as $reward) {
        \App\Models\Reward::create($reward);
    }
}
}
