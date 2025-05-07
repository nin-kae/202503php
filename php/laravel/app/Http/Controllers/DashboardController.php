<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Application;

class DashboardController extends Controller
{
    public function index(): Factory|Application|View
    {
        $users = User::where('active',1)->orderBy('name')->get();
        return view('dashboard', compact('users'));
    }
}
