<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $items = DB::table('items')->get();
        
        $messages = ContactMessage::latest()->get();
        
        return view('dashboard.index', compact('items', 'messages'));
    }
}
