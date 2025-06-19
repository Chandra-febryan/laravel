@extends('layout.app2')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Manajemen Transaksi</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Kode Bus</th>
                <th class="px-4 py-2">Rute</th>
                <th class="px-4 py-2">Keberangkatan</th>
                <th class="px-4 py-2">Kursi</th>
                <th class="px-4 py-2">Total</th>
                <th class="px-4 py-2">Metode</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $t)
            <tr class="text-center border-b">
                <td class="px-4 py-2">{{ $t->tanggal }}</td>
                <td class="px-4 py-2">{{ $t->kode_bus }}</td>
                <td class="px-4 py-2">{{ $t->nama_rute }}</td>
                <td class="px-4 py-2">{{ $t->berangkat }} - {{ $t->tiba }}</td>
                <td class="px-4 py-2">{{ $t->jumlah_kursi }}</td>
                <td class="px-4 py-2">Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                <td class="px-4 py-2">{{ $t->metode_bayar }}</td>
                <td class="px-4 py-2 font-semibold {{ $t->status === 'selesai' ? 'text-green-600' : 'text-orange-500' }}">
                    {{ ucfirst($t->status) }}
                </td>
                <td class="px-4 py-2">
                    <form action="{{ route('admin.transaksi.updateStatus', $t->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="border rounded p-1 text-sm">
                            <option value="pending" {{ $t->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                            <option value="selesai" {{ $t->status == 'selesai' ? 'selected' : '' }}>Disetujui</option>
                        </select>
                        <button type="submit" class="ml-2 px-2 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-500">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
