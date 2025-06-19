@extends('layout.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Jadwal Bus Tersedia</h1>

    <table class="min-w-full border text-sm text-center">
        <thead class="bg-green-500 text-white">
            <tr>
                <th class="px-4 py-2">Kode Bus</th>
                <th class="px-4 py-2">Rute</th>
                <th class="px-4 py-2">Berangkat</th>
                <th class="px-4 py-2">Tiba</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jadwals as $jadwal)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2">{{ $jadwal->kode_bus }}</td>
                    <td>{{ $jadwal->rute }}</td>
                    <td>{{ $jadwal->bus_start }}</td>
                    <td>{{ $jadwal->bus_end }}</td>
                </tr>
            @empty
                <tr><td colspan="4" class="py-4 text-gray-500">Tidak ada jadwal tersedia</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
