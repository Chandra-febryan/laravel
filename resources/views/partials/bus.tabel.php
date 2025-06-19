<table class="min-w-full text-sm text-gray-700 border">
    <thead class="bg-gray-100">
        <tr><th class="p-2">Kode Bus</th><th>Rute</th></tr>
    </thead>
    <tbody>
        @foreach($bus as $item)
        <tr class="border-t">
            <td class="p-2">{{ $item->kode_bus }}</td>
            <td>{{ $item->rute }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
