<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome via CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-green-800 text-white p-5 space-y-2">
            <div class="text-xl font-bold mb-5">🌐 Admin JatimGo</div>
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block hover:bg-green-600 px-3 py-2 rounded">User</a>
                <a href="{{route('jadwal.index')}}" class="block hover:bg-green-600 px-3 py-2 rounded">Atur Jadwal</a>
                <a href="#" class="block hover:bg-green-600 px-3 py-2 rounded" >Role</a>
                <a href="#" class="block hover:bg-green-600 px-3 py-2 rounded">Menu</a>
                <a href="#" class="block hover:bg-green-600 px-3 py-2 rounded">Assign Role</a>
               </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-8 bg-white">
            @yield('content')
            @stack('scripts')
        </main>
    </div>
</body>
@include('partials.footer')
</html>
