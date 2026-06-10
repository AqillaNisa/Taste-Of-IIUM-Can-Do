<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Stall;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'userCount' => User::count(),
            'stallCount' => Stall::count(),
            'foodCount' => Food::count(),
            'recentStalls' => Stall::latest()->limit(5)->get(),
        ]);
    }
}
