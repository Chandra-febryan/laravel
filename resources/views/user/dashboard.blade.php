<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pengguna - JatimGO</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Plugin Tailwind (opsional & powerful untuk layout) -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a5632',
                        secondary: '#2e7d32',
                        accent: '#4caf50',
                    }
                }
            },
            plugins: [
                tailwindcss.typography,
                tailwindcss.forms,
                tailwindcss.lineClamp,
                tailwindcss.aspectRatio
            ]
        }
    </script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">

    @include('partials.navbar')

    <div class="max-w-7xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold text-primary mb-6">
            Selamat datang, {{ Auth::user()->username }}
        </h1>

        <p class="text-gray-700 mb-4 leading-relaxed">
            JatimGO merupakan aplikasi yang berisi informasi tentang operasional transportasi bus TransJatim. 
            Aplikasi ini mendukung SDGs no 11 tentang sustainable cities, fokus pada transportasi berkelanjutan.
        </p>

        <!-- Statistik -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            @foreach ([
                ['value' => '15', 'label' => 'Rute Aktif'],
                ['value' => '120', 'label' => 'Bus Beroperasi'],
                ['value' => '85%', 'label' => 'Ketepatan Waktu'],
                ['value' => '4.8', 'label' => 'Rating Pengguna']
            ] as $stat)
                <div class="bg-green-50 p-4 rounded-lg shadow">
                    <div class="text-primary font-bold text-xl">{{ $stat['value'] }}</div>
                    <div class="text-sm text-gray-600">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>

        <!-- Layanan -->
        <div class="bg-white p-6 rounded-xl shadow-md mb-12">
            <h2 class="text-2xl font-bold text-primary mb-6">Layanan Terintegrasi</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach ([
                    ['icon' => 'route', 'title' => 'Info Rute', 'desc' => 'Informasi rute perjalanan Trans Jatim di seluruh Jawa Timur', 'url' => '/rute'],
                    ['icon' => 'ticket-alt', 'title' => 'Info Tiket', 'desc' => 'Detail tiket Trans Jatim termasuk harga dan promo', 'url' => '/tiket'],
                    ['icon' => 'bus', 'title' => 'Jadwal Bus', 'desc' => 'Jadwal keberangkatan dan kedatangan bus Trans Jatim', 'url' => '/jadwal'],
                ] as $layanan)
                    <div class="border border-gray-200 rounded-lg p-5 hover:border-accent transition">
                        <div class="flex items-start mb-3">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-{{ $layanan['icon'] }} text-accent text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg mb-1">{{ $layanan['title'] }}</h3>
                                <p class="text-gray-600 mb-3">{{ $layanan['desc'] }}</p>
                                <a href="{{ url($layanan['url']) }}" class="text-accent font-medium flex items-center">
                                    Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Artikel -->
        <section class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-primary">Artikel & Berita Terkini</h2>
                <a href="{{ url('/artikel') }}" class="text-accent font-medium hover:underline">Lihat Semua</a>
            </div>
            <!-- Placeholder artikel -->
        </section>

        <!-- SDGs Section -->
        <section class="bg-green-50 rounded-xl p-8 mb-12">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-6 md:mb-0 md:pr-8">
                    <img src="{{ asset('images/ods11.png') }}" alt="SDG 11" class="w-full max-w-xs mx-auto">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-2xl font-bold text-primary mb-4">Mendukung SDGs No. 11</h2>
                    <p class="text-gray-700 mb-4 leading-relaxed">
                        JatimGO mendukung Sustainable Development Goals (SDGs) no.11 untuk kota berkelanjutan.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ([
                            ['icon' => 'leaf', 'label' => 'Emisi Karbon Rendah'],
                            ['icon' => 'users', 'label' => 'Akses untuk Semua'],
                            ['icon' => 'shield-alt', 'label' => 'Keamanan Penumpang'],
                            ['icon' => 'city', 'label' => 'Perkotaan Berkelanjutan'],
                        ] as $item)
                            <div class="bg-white p-3 rounded-lg shadow-sm flex items-center">
                                <div class="bg-green-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-{{ $item['icon'] }} text-accent"></i>
                                </div>
                                <span class="font-medium">{{ $item['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>
</html>
