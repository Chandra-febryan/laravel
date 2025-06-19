@extends('layout.app2')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('jadwal.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        + Tambah Jadwal
    </a>

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full text-center">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-6">Kode Bus</th>
                    <th class="py-3 px-6">Rute</th>
                    <th class="py-3 px-6">Berangkat</th>
                    <th class="py-3 px-6">Tiba</th>
                    <th class="py-3 px-6">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @foreach ($jadwals as $jadwal)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $jadwal->kode_bus }}</td>
                        <td class="py-2 px-4">{{ $jadwal->rute }}</td>
                        <td class="py-2 px-4">{{ $jadwal->bus_start }}</td>
                        <td class="py-2 px-4">{{ $jadwal->bus_end }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="text-blue-600 hover:underline">Edit</a> |
                            <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin hapus?')" class="text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
