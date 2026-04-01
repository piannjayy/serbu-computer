<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;

class DashboardApiController extends Controller
{
    public function index()
    {
        // Hapus order cash expired (logic tetap dipakai)
        Order::clearExpiredCashOrders();

        $totalUsers = User::where('role', 'pengguna')->count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();

        $totalRevenue = (float) Order::where('status', 'selesai')
            ->sum('total_harga');

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

        return response()->json([
            'status' => true,
            'message' => 'Dashboard data retrieved successfully',
            'data' => [
                'total_users' => $totalUsers,
                'total_products' => $totalProducts,
                'total_orders' => $totalOrders,
                'total_revenue' => $totalRevenue,
                'today_revenue' => $todayRevenue,
                'pending_orders' => $pendingOrders,
                'potential_revenue' => $potentialRevenue,
            ]
        ]);
    }
}