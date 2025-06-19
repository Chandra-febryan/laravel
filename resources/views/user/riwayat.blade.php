@extends('layout.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Riwayat Transaksi Tiket</h1>

    @if($riwayats->isEmpty())
        <p class="text-gray-500">Belum ada transaksi.</p>
    @else
        <table class="w-full text-left border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Tanggal</th>
                    <th class="p-2 border">Kode Bus</th>
                    <th class="p-2 border">Rute</th>
                    <th class="p-2 border">Keberangkatan</th>
                    <th class="p-2 border">Kursi</th>
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">Metode</th>
                    <th class="p-2 border">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($riwayats as $item)
                <tr>
                    <td class="p-2 border">{{ $item->tanggal }}</td>
                    <td class="p-2 border">{{ $item->kode_bus }}</td>
                    <td class="p-2 border">{{ $item->nama_rute }}</td>
                    <td class="p-2 border">{{ $item->berangkat }} - {{ $item->tiba }}</td>
                    <td class="p-2 border">{{ $item->jumlah_kursi }}</td>
                    <td class="p-2 border">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                    <td class="p-2 border">{{ $item->metode_bayar }}</td>
                    <td class="p-2 border">
                        @if($item->status === 'selesai')
                            <span class="text-green-600 font-semibold">Disetujui</span>
                        @else
                            <span class="text-yellow-600">Menunggu</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
