<?php
//This grabs the logged in user, 
// calculates their balance using the method we added to the User model, 
// fetches their transactions newest first, 
// and passes everything to the view.
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $balance = $user->pointsBalance();
        $transactions = $user->transactions()->latest()->paginate(10);
        return view('dashboard', compact('balance', 'transactions'));
    }
}