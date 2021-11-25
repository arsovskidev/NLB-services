<?php

namespace App\Http\Controllers;

use App\Models\Client;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
    public function dashboard()
    {
        $clients = Client::get();

        return view('dashboard', compact('clients'));
    }
}
