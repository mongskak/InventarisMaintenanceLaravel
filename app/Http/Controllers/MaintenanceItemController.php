<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceItem;

class MaintenanceItemController extends Controller
{
    // function create 
    public function create(Request $request)
    {
        $validate = $request->validate([
            'maintenance_id' => 'required',
            'item_id' => 'required',
        ]);

        MaintenanceItem::create($validate);

        return redirect()->back()->with('success', 'Data berhasil disimpan!')->withInput();
    }

    // function delete
    public function delete($id)
    {
        $mainItem = MaintenanceItem::find($id);
        $mainItem->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
