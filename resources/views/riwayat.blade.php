@extends('layout.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10 px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Transaksi Tiket</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($transaksi->isEmpty())
        <div class="text-gray-500 text-center py-10">
            Belum ada transaksi yang tercatat.
        </div>
    @else
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Kode Bus</th>
                        <th class="px-4 py-3">Rute</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Waktu</th>
                        <th class="px-4 py-3">Jumlah Kursi</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3">Metode</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Waktu Transaksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($transaksi as $t)
                    <tr>
                        <td class="px-4 py-3 font-semibold text-gray-700">{{ $t->kode_bus }}</td>
                        <td class="px-4 py-3">{{ $t->nama_rute }}</td>
                        <td class="px-4 py-3">{{ $t->tanggal }}</td>
                        <td class="px-4 py-3">{{ $t->berangkat }} → {{ $t->tiba }}</td>
                        <td class="px-4 py-3">{{ $t->jumlah_kursi }}</td>
                        <td class="px-4 py-3 text-orange-600 font-bold">Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">{{ $t->metode_bayar }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold
                                @if($t->status == 'selesai') bg-green-100 text-green-800
                                @elseif($t->status == 'pending') bg-yellow-100 text-yellow-700
                                @elseif($t->status == 'ditolak') bg-red-100 text-red-700
                                @else bg-gray-200 text-gray-600 @endif">
                                {{ ucfirst($t->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-500">{{ date('d M Y H:i', strtotime($t->created_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
