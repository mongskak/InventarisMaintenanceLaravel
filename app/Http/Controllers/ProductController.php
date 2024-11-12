<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function generateCode()
    {

        $count = Products::all()->count();
        // Increment sequence berdasarkan jumlah yang ada
        $sequence = str_pad($count + 1, 3, '0', STR_PAD_LEFT); // 3 digit sequence

        // Generate 5 digit random number
        $randomNumber = mt_rand(10000, 99999);

        // Generate 3 random uppercase letters
        $randomLetters = strtoupper(Str::random(3));

        // Format akhir kode: [Prefix]-[randomNumber5digit]-[Sequence3digit]
        $code = "BRG-{$randomNumber}-{$sequence}";

        return $code;
    }



    public function list()
    {
        $products = Products::latest()->paginate(5); // Assuming Product model exists and has a 'all' method


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
            "description" => "required"
        ]);

        $kode_auto = $this->generateCode();

        $product = new Products();
        $product->name = $request->name;
        $product->serial_number = $request->serial_number;
        $product->kode = $kode_auto;
        $product->description = $request->description;
        $product->save();

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
