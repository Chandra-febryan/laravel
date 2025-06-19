<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>JatimGO</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-green-700 p-4 text-white">
        <ul class="flex justify-between">
            <li class="font-bold">JatimGO</li>
            <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section >

        <div class="bg-cover bg-center h-64" style="background-image: url('{{ asset('images/bus.jpg') }}');" >
            <div class="text-center text-white px-4 py-8">
                <h1 class=" text-green-500 text-4xl md:text-5xl font-bold mb-4">JatimGO - Transportasi Umum Jawa Timur</h1>
                <p class=" text-gray-500  text-lg md:text-xl font-semibold">Layanan transportasi umum terintegrasi yang memudahkan perjalanan Anda</p>
            </div>
        </div>
    </section>

    <!-- Welcome Content -->
    <div class="container mx-auto px-4 py-12 text-center">
        <h2 class="text-3xl font-bold text-primary mb-6">Selamat Datang di JatimGO!</h2>
        <p class="text-lg text-gray-700 mb-8 max-w-3xl mx-auto">
            Dapatkan semua informasi mengenai Trans Jatim yang memudahkan perjalanan Anda.
            Silakan login atau registrasi untuk mengakses jadwal bus dan layanan lengkap kami.
        </p>
        <div class="grid md:grid-cols-3 gap-8 mb-12">
            <div class="bg-white p-6 rounded-xl shadow-md service-card">
                <div class="text-primary text-4xl mb-4">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Rute Lengkap</h3>
                <p class="text-gray-600">Temukan rute perjalanan bus Trans Jatim di seluruh Jawa Timur</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md service-card">
                <div class="text-primary text-4xl mb-4">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Jadwal Tepat</h3>
                <p class="text-gray-600">Informasi jadwal keberangkatan dan kedatangan yang akurat</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md service-card">
                <div class="text-primary text-4xl mb-4">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-800">Pembelian Tiket</h3>
                <p class="text-gray-600">Beli tiket secara online untuk kenyamanan perjalanan Anda</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-green-700 text-white text-center py-4">
        &copy; {{ date('Y') }} JatimGO. All rights reserved.
    </footer>

</body>
</html>
