<?php

namespace App\Http\Controllers;

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

        return view('index', compact('pembayarans'));
    }

    public function updateStatus(Request $request, $id)
    {
        DB::table('pembayaran')
            ->where('id', $id)
            ->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
