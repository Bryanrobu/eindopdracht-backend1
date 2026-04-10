<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     * Dit wordt je dashboard overzicht met alle items.
     */
    public function index()
    {
        $items = DB::table('items')->get();
        return view('dashboard.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     * Toont de pagina om een nieuw gerecht toe te voegen.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     * Slaat de data uit het 'create' formulier op in de database.
     */
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

    /**
     * Show the form for editing the specified resource.
     * Toont het formulier, vooringevuld met de huidige data van het item.
     */
    public function edit(string $id)
    {
        $item = DB::table('items')->where('id', $id)->first();

        if (!$item) {
            return redirect()->route('items.index')->with('error', 'Item niet gevonden.');
        }

        return view('dashboard.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     * Slaat de wijzigingen uit het 'edit' formulier op.
     */
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

    /**
     * Remove the specified resource from storage.
     * Verwijdert het item uit de database.
     */
    public function destroy(string $id)
    {
        DB::table('items')
            ->where('id', $id)
            ->delete();

        return redirect()->route('items.index')->with('success', 'Item definitief verwijderd!');
    }
}
