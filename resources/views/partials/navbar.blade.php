<script src="https://cdn.tailwindcss.com"></script>

<nav class="bg-green-700 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="text-2xl font-bold tracking-wide">JatimGO</div>

        <!-- Menu Utama -->
        <div class="space-x-6 hidden md:flex items-center">
            <a href="{{ route('dashboard') }}" class="hover:text-green-200 transition font-medium">Beranda</a>
            <a href="{{route('user.jadwal')}}" class="hover:text-green-200 transition font-medium">Jadwal</a>
            <a href="{{ route('tiket.index') }}" class="hover:text-green-200 transition font-medium">Tiket</a>
            <a href="{{ url('/artikel') }}" class="hover:text-green-200 transition font-medium">Artikel</a>
            <a href="{{ route('riwayat') }}" class="hover:text-green-200 transition font-medium">Riwayat</a>

            @auth
<!-- Logout Button -->
<a href="{{ route('logout') }}"
   class="ml-4 bg-red-500 hover:bg-red-400 text-white px-3 py-1 rounded font-medium">
   Logout
</a>
               
           
            @endauth
</div>
        </div>
    </div>
</nav>
