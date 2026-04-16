<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        $items = DB::table('items')->get();
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

        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('items')->insert($data);

        return redirect()->route('items.index')->with('success', 'Item succesvol toegevoegd!');
    }

    public function edit(string $id)
    {
        $item = DB::table('items')->where('id', $id)->first();

        if (!$item) {
            return redirect()->route('items.index')->with('error', 'Item niet gevonden.');
        }

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

        $data['updated_at'] = now();

        DB::table('items')
            ->where('id', $id)
            ->update($data);

        return redirect()->route('items.index')->with('success', 'Item succesvol bijgewerkt!');
    }

    public function destroy(string $id)
    {
        DB::table('items')
            ->where('id', $id)
            ->delete();

        return redirect()->route('items.index')->with('success', 'Item definitief verwijderd!');
    }
}
