<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use Illuminate\Http\Request;

class ShoppingListController extends Controller
{
    public function index()
    {
        $lists = ShoppingList::all();
        return view('shopping.index', compact('lists'));
    }

    public function create()
    {
        return view('shopping.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'items' => 'required|string',
        ]);

        ShoppingList::create($validated);

        return redirect()->route('shopping-lists.index')->with('success', 'Liste créée avec succès');
    }

    public function edit($id)
    {
        $list = ShoppingList::findOrFail($id);
        return view('shopping.edit', compact('list'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'items' => 'required|string',
        ]);

        $list = ShoppingList::findOrFail($id);
        $list->update($validated);

        return redirect()->route('shopping-lists.index')->with('success', 'Liste mise à jour avec succès');
    }

    public function destroy($id)
    {
        $list = ShoppingList::findOrFail($id);
        $list->delete();

        return redirect()->route('shopping-lists.index')->with('success', 'Liste supprimée avec succès');
    }
}
