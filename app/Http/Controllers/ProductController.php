<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $products = Products::paginate(5); // Assuming Product model exists and has a 'all' method


        return view('layouts.pages.product.list', compact('products'));
    }

    public function detail($id)
    {
        $productById = Products::find($id); // Assuming Product model exists and has a 'find' method

        return view('layouts.pages.product.edit', compact('productById'));
    }
    public function add()
    {
        return view('layouts.pages.product.create');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "serial_number" => "required",
            "kode" => "required",
            "description" => "required"
        ]);

        Products::create($validated);

        return redirect('/products');
    }
    public function delete($id)
    {
        $product = Products::find($id);
        $product->delete();


        return redirect('/products');
    }

    public function edit(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "required",
            "serial_number" => "required",
            "kode" => "required",
            "description" => "required"
        ]);
        //update Products
        Products::where('id', $id)->update($validated);

        return redirect('/products');
    }
}
