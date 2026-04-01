<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
{
    Order::clearExpiredCashOrders();

    $totalUsers = User::where('role', 'pengguna')->count();
    $totalProducts = Product::count();
    $totalOrders = Order::count();

    // ✅ Total revenue semua waktu
    $totalRevenue = (float) Order::where('status', 'selesai')
        ->sum('total_harga');

    // 🔥 Revenue hari ini (AUTO RESET TIAP HARI)
    $todayRevenue = (float) Order::where('status', 'selesai')
        ->whereDate('created_at', Carbon::today())
        ->sum('total_harga');

    $pendingOrders = Order::whereIn('status', [
        'menunggu_verifikasi',
        'menunggu_pembayaran_tunai'
    ])->count();

    $potentialRevenue = (float) Order::whereIn('status', [
        'menunggu_verifikasi',
        'menunggu_pembayaran_tunai'
    ])->sum('total_harga');

    return view('admin.dashboard', compact(
        'totalUsers',
        'totalProducts',
        'totalOrders',
        'totalRevenue',
        'todayRevenue', // 🔥 kirim ke blade
        'pendingOrders',
        'potentialRevenue'
    ));
}
}