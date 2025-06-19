@extends('layout.app2')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">Tambah Jadwal Baru</h1>

    <form action="{{ route('jadwal.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label for="bus_id" class="block font-medium">Pilih Bus</label>
            <select name="bus_id" id="bus_id" class="w-full border rounded px-3 py-2">
                <option disabled selected>-- Pilih Bus --</option>
                @foreach ($armadas as $armada)
                    <option value="{{ $armada->id }}">{{ $armada->kode_bus }} - {{ $armada->rute }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="bus_start" class="block font-medium">Jam Mulai</label>
            <input type="time" name="bus_start" id="bus_start" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="bus_end" class="block font-medium">Jam Selesai</label>
            <input type="time" name="bus_end" id="bus_end" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('jadwal.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</div>
@endsection
