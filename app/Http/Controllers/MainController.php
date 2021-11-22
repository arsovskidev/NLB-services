<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $clients = Client::get();

        return view('dashboard', compact('clients'));
    }
}
