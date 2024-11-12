<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Products;
use App\Models\Maintenance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MaintenanceItem;

class MaintenanceController extends Controller
{

    public function generateCode()
    {

        $count = Maintenance::all()->count();
        // Increment sequence berdasarkan jumlah yang ada
        $sequence = str_pad($count + 1, 3, '0', STR_PAD_LEFT); // 3 digit sequence

        // Generate 5 digit random number
        $randomNumber = mt_rand(10000, 99999);

        // Generate 3 random uppercase letters
        $randomLetters = strtoupper(Str::random(3));

        // Format akhir kode: [Prefix]-[randomNumber5digit]-[Sequence3digit]
        $code = "M-{$randomNumber}-{$sequence}";

        return $code;
    }
    public function list()
    {
        $maintenances = Maintenance::latest()->paginate(5);

        return view('layouts.pages.maintenance.list', compact('maintenances'));
    }

    // function edit()
    public function detail($id)
    {
        // find all products
        $products = Products::all();
        //find all item
        $items = Item::all();

        //find maintenance item
        $mainitems = MaintenanceItem::where([
            'maintenance_id' => $id,
        ])->paginate(5);

        $maintenanceById = Maintenance::find($id);

        return view('layouts.pages.maintenance.edit', compact('maintenanceById', 'products', 'items', 'mainitems'));
    }

    public function add()
    {
        //find all products
        $products = Products::all();

        return view('layouts.pages.maintenance.create', compact('products'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            "product_id" => "required",
            "start_date" => "required",
            "reason" => "required",
            "status" => "required",
            "priority" => "required",
            "end_date" => "required",
        ]);

        $maintenance =  new Maintenance();
        $maintenance->kode = $this->generateCode();
        $maintenance->product_id = $request->product_id;
        $maintenance->start_date = $request->start_date;
        $maintenance->reason = $request->reason;
        $maintenance->status = $request->status;
        $maintenance->priority = $request->priority;
        $maintenance->end_date = $request->end_date;
        $maintenance->save();

        return redirect('/maintenances/' . $maintenance->id);
    }

    public function edit(Request $request, $id)
    {
        $validated = $request->validate([
            "product_id" => "required",
            "start_date" => "required",
            "status" => "required",
            "priority" => "required",
            "end_date" => "required",
        ]);
        $maintenance = Maintenance::where('id', $id)->update($validated);

        return redirect('/maintenances');
    }
}
