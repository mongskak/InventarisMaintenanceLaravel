<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Products;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah maintenance berdasarkan status
        $pendingCount = Maintenance::where('status', 'Pending')->count();
        $solvedCount = Maintenance::where('status', 'Solved')->count();
        $onProgressCount = Maintenance::where('status', 'onProgress')->count();

        // Mengambil satu data maintenance yang terbaru dengan status 'solved'
        $latestSolvedMaintenance = Maintenance::where('status', 'solved')
            ->latest() // Mengambil data terbaru
            ->first(); // Ambil hanya satu data pertama (terbaru)

        //mengambil count product yang sering di maintenance
        $productMaintenanceCount = Products::withCount('maintenance')  // Menghitung jumlah maintenance yang terkait dengan barang
            ->orderByDesc('maintenance_count')  // Mengurutkan berdasarkan jumlah maintenance terbanyak
            ->take(10)  // Ambil 10 produk teratas
            ->get();

        // Menampilkan ke view
        return view(
            'layouts.pages.dashboard.index',
            compact(
                'pendingCount',
                'solvedCount',
                'onProgressCount',
                'latestSolvedMaintenance',
                'productMaintenanceCount'
            )
        );
    }
}
