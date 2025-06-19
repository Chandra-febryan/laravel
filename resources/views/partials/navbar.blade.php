<script src="https://cdn.tailwindcss.com"></script>

<nav class="bg-green-700 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="text-2xl font-bold tracking-wide">JatimGO</div>

        <!-- Menu Utama -->
        <div class="space-x-6 hidden md:flex items-center">
            <a href="{{ route('dashboard') }}" class="hover:text-green-200 transition font-medium">Beranda</a>
            <a href="" class="hover:text-green-200 transition font-medium">Jadwal</a>
            <a href="{{ route('tiket.index') }}" class="hover:text-green-200 transition font-medium">Tiket</a>
            <a href="{{ url('/artikel') }}" class="hover:text-green-200 transition font-medium">Artikel</a>
            <a href="{{ route('riwayat') }}" class="hover:text-green-200 transition font-medium">Riwayat</a>

            @auth
<!-- Logout Button -->
<a href="{{ route('logout') }}"
   class="ml-4 bg-red-500 hover:bg-red-400 text-white px-3 py-1 rounded font-medium">
   Logout
</a>
               
            @else
                <!-- Login Dropdown -->
                <div class="relative group">
                    <button class="flex items-center space-x-1 hover:text-green-200 focus:outline-none">
                        <span>Masuk</span>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4-4-4a1 1 0 010-1.414z"/>
                        </svg>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50 hidden group-hover:block">
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-100">Login</a>
                        <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-100">Register</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
