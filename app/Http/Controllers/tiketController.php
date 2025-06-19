<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiketController extends Controller
{
    public function index(Request $request)
    {
        $jadwals = DB::table('tb_rute as rute')
            ->join('tb_armada as armada', 'rute.id_bus', '=', 'armada.id')
            ->select(
                'rute.id_rute',
                'rute.tanggal',
                'rute.berangkat',
                'rute.tiba',
                'rute.harga',
                'armada.kode_bus',
                'armada.rute'
            )
            ->when($request->dari, fn($q) => $q->where('armada.rute', 'like', '%' . $request->dari . '%'))
            ->when($request->ke, fn($q) => $q->where('armada.rute', 'like', '%' . $request->ke . '%'))
            ->when($request->tanggal, fn($q) => $q->where('rute.tanggal', $request->tanggal))
            ->orderBy('rute.tanggal')
            ->get();

        return view('tiket', compact('jadwals'));
    }

    public function detail(Request $request, $id)
    {
        $jadwal = DB::table('tb_rute as rute')
            ->join('tb_armada as armada', 'rute.id_bus', '=', 'armada.id')
            ->select(
                'rute.id_rute',
                'rute.tanggal',
                'rute.berangkat',
                'rute.tiba',
                'rute.harga',
                'armada.kode_bus',
                'armada.rute'
            )
            ->where('rute.id_rute', $id)
            ->first();

        $jumlah_kursi = $request->jumlah_kursi ?? 1;
        $total = $jadwal ? ($jadwal->harga * $jumlah_kursi) : 0;

        return view('tiket_selesai', [
            'jadwal' => $jadwal,
            'jumlah_kursi' => $jumlah_kursi,
            'total' => $total,
     // status simulasi, bukan dari database
        ]);
    }
    public function bayar(Request $request, $id)
{
    $jadwal = DB::table('tb_rute')->where('id_rute', $id)->first();
    $total = $jadwal->harga * $request->jumlah_kursi;

    DB::table('tb_transaksi')->insert([
        'jadwal_id' => $id,
        'jumlah_kursi' => $request->jumlah_kursi,
        'total' => $total,
        'status' => 'menunggu pembayaran',
        'metode_bayar' => $request->metode_bayar ?? 'QR',
        'create_at' => now(),
        'update_at' => now(),
    ]);

    return redirect()->route('riwayat')->with('success', 'Pembayaran berhasil. Menunggu konfirmasi admin.');
}
public function riwayat()
{
    $riwayats = DB::table('tb_transaksi as t')
        ->join('tb_rute as r', 't.jadwal_id', '=', 'r.id_rute')
        ->join('tb_armada as a', 'r.id_bus', '=', 'a.id')
        ->select(
            't.id',
            'r.tanggal',
            'r.berangkat',
            'r.tiba',
            'a.kode_bus',
            'a.rute as nama_rute',
            't.jumlah_kursi',
            't.total',
            't.status',
            't.metode_bayar',
            't.create_at'
        )
        ->orderByDesc('t.create_at')
        ->get();

    return view('user.riwayat', compact('riwayats'));
}



}
