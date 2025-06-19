@extends('layout.app2')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">Jadwal Bus</h1>

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full text-center">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-6">Kode Bus</th>
                    <th class="py-3 px-6">Rute</th>
                    <th class="py-3 px-6">Berangkat</th>
                    <th class="py-3 px-6">Tiba</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @foreach ($jadwals as $jadwal)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $jadwal->kode_bus }}</td>
                        <td class="py-2 px-4">{{ $jadwal->rute }}</td>
                        <td class="py-2 px-4">{{ $jadwal->bus_start }}</td>
                        <td class="py-2 px-4">{{ $jadwal->bus_end }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
