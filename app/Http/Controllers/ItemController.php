<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        $items = Item::all();
        return view('dashboard.index', compact('items', 'messages'));
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        Item::create($data);

        return redirect()->route('items.index')->with('success', 'Item succesvol toegevoegd!');
    }

    public function edit(string $id)
    {
        $item = Item::findOrFail($id);

        return view('dashboard.edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $item = Item::findOrFail($id);
        $item->update($data);

        return redirect()->route('items.index')->with('success', 'Item succesvol bijgewerkt!');
    }

    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item definitief verwijderd!');
    }
}
