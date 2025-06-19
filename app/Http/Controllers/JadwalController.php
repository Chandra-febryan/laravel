<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = DB::table('tb_jadwal')
            ->join('tb_armada', 'tb_jadwal.bus_id', '=', 'tb_armada.id')
            ->select('tb_jadwal.*', 'tb_armada.kode_bus', 'tb_armada.rute')
            ->get();

        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $armadas = DB::table('tb_armada')->get();
        return view('jadwal.create', compact('armadas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_id' => 'required|exists:tb_armada,id',
            'bus_start' => 'required',
            'bus_end' => 'required',
        ]);

        DB::table('tb_jadwal')->insert([
            'bus_id' => $request->bus_id,
            'bus_start' => $request->bus_start,
            'bus_end' => $request->bus_end,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = DB::table('tb_jadwal')->where('id', $id)->first();
        $armadas = DB::table('tb_armada')->get();

        return view('jadwal.edit', compact('jadwal', 'armadas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bus_id' => 'required|exists:tb_armada,id',
            'bus_start' => 'required',
            'bus_end' => 'required',
        ]);

        DB::table('tb_jadwal')->where('id', $id)->update([
            'bus_id' => $request->bus_id,
            'bus_start' => $request->bus_start,
            'bus_end' => $request->bus_end,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('tb_jadwal')->where('id', $id)->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
  


}
