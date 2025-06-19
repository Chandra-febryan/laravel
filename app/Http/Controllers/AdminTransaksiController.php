<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        $transaksis = DB::table('tb_transaksi as t')
            ->join('tb_rute as r', 't.jadwal_id', '=', 'r.id_rute')
            ->join('tb_armada as a', 'r.id_bus', '=', 'a.id')
            ->select(
                't.id', 'r.tanggal', 'r.berangkat', 'r.tiba',
                'a.kode_bus', 'a.rute as nama_rute',
                't.jumlah_kursi', 't.total', 't.status', 't.metode_bayar'
            )
            ->orderByDesc('t.id')
            ->get();

        return view('admin.transaksi', compact('transaksis'));
    }

    public function updateStatus(Request $request, $id)
    {
        DB::table('tb_transaksi')
            ->where('id', $id)
            ->update([
                'status' => $request->status,
                'update_at' => now(),
            ]);

        return redirect()->route('admin.transaksi')->with('success', 'Status diperbarui.');
    }
}
