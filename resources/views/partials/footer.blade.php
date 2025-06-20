<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer - JatimGO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        accent: '#4caf50',
                    }
                }
            }
        }
    </script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<footer class="bg-gray-800 text-gray-300 pt-12 pb-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- About -->
            <div>
                <div class="flex items-center mb-4">
                    <i class="fas fa-bus text-2xl text-green-400 mr-2"></i>
                    <span class="text-xl font-bold text-white">JatimGO</span>
                </div>
                <p class="text-sm mb-4">
                    Layanan transportasi umum terintegrasi Jawa Timur yang memudahkan perjalanan Anda dengan 
                    informasi rute, jadwal, dan pembelian tiket secara online.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-white font-bold mb-4 text-lg">Hubungi Kami</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt text-green-400 mt-1 mr-3"></i>
                        <span>Jl. Kusumabangsa 17 Surabaya, Jawa Timur 60171</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone-alt text-green-400 mr-3"></i>
                        <span>0878-2713-8292</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope text-green-400 mr-3"></i>
                        <span>travel@jatimgo.co.id</span>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h3 class="text-white font-bold mb-4 text-lg">Berlangganan</h3>
                <p class="text-sm mb-4">
                    Dapatkan informasi terbaru tentang promo dan update rute langsung ke email Anda.
                </p>
                <form action="#" method="POST" class="flex">
                    <input type="email" placeholder="Alamat Email" class="bg-gray-700 text-white px-4 py-2 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-accent w-full">
                    <button type="submit" class="bg-accent hover:bg-green-600 px-4 py-2 rounded-r-lg transition">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-700 pt-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm mb-4 md:mb-0">
                    &copy; 2025 JatimGO. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-sm hover:text-accent transition">Kebijakan Privasi</a>
                    <a href="#" class="text-sm hover:text-accent transition">Syarat & Ketentuan</a>
                    <a href="#" class="text-sm hover:text-accent transition">FAQ</a>
                </div>
            </div>
        </div>

        <div class="text-center text-xs text-gray-600 mt-10">
            © 2025 JatimGo.co.id
        </div>
    </div>
</footer>

</body>
</html>
