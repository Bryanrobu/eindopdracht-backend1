<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Item;

class DashboardController extends Controller
{
    public function index()
    {
        $items = Item::all();
        
        $messages = ContactMessage::latest()->get();
        
        return view('dashboard.index', compact('items', 'messages'));
    }
}
