<table class="min-w-full text-sm text-gray-700 border">
    <thead class="bg-gray-100">
        <tr><th class="p-2">Tanggal</th><th>Berangkat</th><th>Tiba</th></tr>
    </thead>
    <tbody>
        @foreach($jadwal as $item)
        <tr class="border-t">
            <td class="p-2">{{ $item->tanggal }}</td>
            <td>{{ $item->berangkat }}</td>
            <td>{{ $item->tiba }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
