<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::where('is_active', true)->get();
        $balance = auth()->user()->pointsBalance();

        return view('rewards.index', compact('rewards', 'balance'));
    }

    public function redeem(Request $request)
    {
        $request->validate([
            'reward_id' => 'required|exists:rewards,id',
        ]);

        $user = auth()->user();
        $reward = Reward::findOrFail($request->reward_id);

        //Notice the pointsBalance() check before deducting — this is defensive coding
        if ($user->pointsBalance() < $reward->points_cost) {
            return back()->with('error', 'You do not have enough points to redeem this reward.');
        }

        $user->transactions()->create([
            'type' => 'redeemed',
            'points' => $reward->points_cost,
            'description' => 'Redeemed for ' . $reward->name,
        ]);

        return back()->with('success', 'You have successfully redeemed ' . $reward->name . '!');
    }
}