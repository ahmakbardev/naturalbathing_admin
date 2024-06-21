<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $pembayarans = DB::table('pembayaran')
            ->join('users', 'pembayaran.user_id', '=', 'users.id')
            ->select('pembayaran.*', 'users.name as user_name', 'users.email as user_email')
            ->get();

        $userCount = User::count();
        $users = DB::table('users')->get();

        $users->transform(function ($user) {
            $user->created_at = Carbon::parse($user->created_at)->format('d M, Y');
            return $user;
        });

        $orderCount = DB::table('pembayaran')->count();
        $paketBiasa = DB::table('paket_biasa')->count();
        $paketSpesial = DB::table('paket_spesial')->count();

        $totalDiterima = DB::table('pembayaran')->where('status', 1)->count();
        $totalPending = DB::table('pembayaran')->where('status', 0)->count();
        $totalGagal = DB::table('pembayaran')->where('status', 2)->count();

        $totalPendapatan = DB::table('pembayaran')->where('status', 1)->sum('paket_data->total');
        $rataRataNilaiPesanan = DB::table('pembayaran')->where('status', 1)->avg('paket_data->total');

        return view('index', compact(
            'pembayarans',
            'userCount',
            'orderCount',
            'paketBiasa',
            'paketSpesial',
            'totalDiterima',
            'totalPending',
            'totalGagal',
            'totalPendapatan',
            'rataRataNilaiPesanan',
            'users'
        ));
    }

    public function updateStatus(Request $request, $id)
    {
        DB::table('pembayaran')
            ->where('id', $id)
            ->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
