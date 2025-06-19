@extends('layout.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 text-center bg-white p-8 shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Tiket Berhasil Dipesan!</h1>
    <p class="text-gray-700 mb-2">Tanggal: {{ $jadwal->tanggal }}</p>
    <p class="text-gray-700 mb-2">Waktu: {{ $jadwal->berangkat }} → {{ $jadwal->tiba }}</p>
    <p class="text-gray-700 mb-2">Jumlah Kursi: {{ $jumlah_kursi }}</p>
     <p class="text-gray-700 mb-2">status: belum dibayar</p>
    <p class="text-gray-700 mb-2">
        Total Bayar: <strong class="text-orange-600">Rp {{ number_format($total, 0, ',', '.') }}</strong>
    </p>

     <form action="{{ route('tiket.index') }}" method="GET">
    @csrf
    <input type="hidden" name="jumlah_kursi" value="{{ $jumlah_kursi }}">
    <div class="mb-4 text-left">
        <label for="metode_bayar" class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
        <select name="metode_bayar" id="metode_bayar" required class="w-full border-gray-300 rounded-md shadow-sm">
            <option value="">-- Pilih Metode --</option>
            <option value="QR">QRIS</option>
            <option value="Transfer">Transfer Bank</option>
            <option value="Tunai">Tunai</option>
        </select>
    </div>

    <div class="text-right">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow">
            Selesaikan Pembayaran & Kembali
        </button>
    </div>
</form>

@endsection