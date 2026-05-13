<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects()->latest()->get();
        return view('client.dashboard', compact('projects'));
    }
}
