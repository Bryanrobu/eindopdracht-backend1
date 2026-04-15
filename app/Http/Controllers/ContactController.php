<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        ContactMessage::create($validated);
        return back()->with('success', 'Bericht verzonden!');
    }

    public function index() {
        $items = [];
        $messages = ContactMessage::latest()->get();
        return view('dashboard.index', compact('items', 'messages'));
    }
}