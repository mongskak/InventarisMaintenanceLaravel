<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function list()
    {
        $items = Item::latest()->paginate(5); // Assuming Item model exists and has a 'paginate' method

        return view('layouts.pages.item.list', compact('items'));
    }

    public function add()
    {
        return view('layouts.pages.item.create');
    }

    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete();


        return redirect('/items');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "description" => "required",
        ]);

        Item::create($validated);

        return redirect('/items');
    }
}
