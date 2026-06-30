<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PointTransaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::withCount('transactions')
            ->with('transactions')
            ->where('is_admin', false)
            ->get()
            ->map(function ($user) {
                $user->balance = $user->pointsBalance();
                return $user;
            });

        return view('admin.index', compact('users'));
    }

    public function creditPoints(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'points' => 'required|integer|min:1|max:10000',
            'description' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($request->user_id);

        $user->transactions()->create([
            'type' => 'earned',
            'points' => $request->points,
            'description' => $request->description,
        ]);

        return back()->with('success', "Added {$request->points} points to {$user->name} successfully.");
    }
}