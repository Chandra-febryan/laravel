@extends('layout.app')

@section('content')
<div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-12 px-6 text-center">
    <h1 class="text-3xl md:text-4xl font-bold mb-4">Pesan Tiket Bus Trans Jatim Online</h1>
    <p class="text-lg md:text-xl mb-4 max-w-2xl mx-auto">
        Jadwal bus, trayek, tempat keberangkatan, fasilitas, harga tiket, hingga pilih kursi.
    </p>
</div>

<div class="bg-white shadow-lg rounded-lg p-6 max-w-5xl mx-auto -mt-10 relative z-10">
    <form action="{{ route('tiket.index') }}" method="GET" class="grid md:grid-cols-4 gap-4">
        <div>
            <label for="dari" class="block text-sm font-medium text-gray-700">Dari</label>
            <input type="text" name="dari" id="dari" value="{{ request('dari') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div>
            <label for="ke" class="block text-sm font-medium text-gray-700">Ke</label>
            <input type="text" name="ke" id="ke" value="{{ request('ke') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div>
            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Pergi</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ request('tanggal') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="md:col-span-4 text-right">
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-md shadow">
                Cari Tiket
            </button>
        </div>
    </form>
</div>

<div class="max-w-5xl mx-auto mt-10 px-4">
    <h2 class="text-xl font-bold text-gray-700 mb-4">Hasil Pencarian Tiket</h2>

    @forelse ($jadwals as $jadwal)
    <div class="bg-white p-4 rounded-lg shadow-md mb-6 flex justify-between items-center">
        <div>
            <h3 class="text-lg font-bold text-gray-800 mb-1">{{ $jadwal->kode_bus }} - {{ $jadwal->rute }}</h3>
            <p class="text-sm text-gray-600">Berangkat: {{ $jadwal->berangkat }} | Tiba: {{ $jadwal->tiba }}</p>
            <p class="text-sm text-gray-500">Tanggal: {{ $jadwal->tanggal }}</p>
        </div>
        <div class="text-right">
            <p class="text-orange-600 font-bold text-lg mb-2">Rp {{ number_format($jadwal->harga, 0, ',', '.') }}</p>
            <form action="{{ route('tiket.detail', $jadwal->id_rute) }}" method="GET">
                <input type="number" name="jumlah_kursi" placeholder="Jumlah Kursi" required class="border rounded px-2 py-1 text-sm w-24 mr-2">
                
                <button type="submit" class="bg-green-600 hover:bg-green-500 text-white text-sm px-4 py-1 rounded">
                    Pilih
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="text-center text-gray-500 py-10">
        Tidak ada data tiket tersedia untuk pencarian ini.
    </div>
    @endforelse
</div>
@endsection
