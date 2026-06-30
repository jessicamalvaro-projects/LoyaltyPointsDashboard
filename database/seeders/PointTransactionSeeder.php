<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $user = \App\Models\User::first();

    $transactions = [
        ['type' => 'earned', 'points' => 500, 'description' => 'Welcome bonus'],
        ['type' => 'earned', 'points' => 150, 'description' => 'Profile completed'],
        ['type' => 'earned', 'points' => 200, 'description' => 'First purchase'],
        ['type' => 'redeemed', 'points' => 100, 'description' => 'Redeemed for R10 airtime'],
        ['type' => 'earned', 'points' => 75, 'description' => 'Referral bonus'],
    ];

    foreach ($transactions as $transaction) {
        $user->transactions()->create($transaction);
    }
}
}
