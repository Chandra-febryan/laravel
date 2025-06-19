

@extends('layout.app2')

@section('content')
<div class="bg-cover bg-center min-h-screen px-8 py-6 rounded-lg" style="background-image: url('{{ asset('images/123.jpg') }}');">
    <div class="bg-white bg-opacity-80 p-6 rounded-lg">
  
    <p class="text-gray-700 mb-4">
        Ini adalah dashboard <strong>Admin</strong>. Kamu bisa mengelola data pengguna, jadwal, dan sistem.
    </p>

    <div class="grid md:grid-cols-4 gap-8 mb-12">
        <!-- Total Pengguna -->
        <div class="bg-green-50 p-4 rounded-lg">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-gray-500 text-sm">Total Pengguna</div>
                    <div class="text-primary font-bold text-2xl">1,248</div>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-users text-accent"></i>
                </div>
            </div>
        </div>

        <!-- Bus Aktif -->
        <div class="bg-green-50 p-4 rounded-lg">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-gray-500 text-sm">Bus Aktif</div>
                    <div class="text-primary font-bold text-2xl">120</div>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-bus text-accent"></i>
                </div>
            </div>
        </div>

        <!-- Tiket Terjual -->
        <div class="bg-green-50 p-4 rounded-lg">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-gray-500 text-sm">Tiket Terjual</div>
                    <div class="text-primary font-bold text-2xl">-</div>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-ticket-alt text-accent"></i>
                </div>
            </div>
        </div>

        <!-- Pendapatan -->
        <div class="bg-green-50 p-4 rounded-lg">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-gray-500 text-sm">Pendapatan</div>
                    <div class="text-primary font-bold text-2xl">Rp.-</div>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-money-bill-wave text-accent"></i>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- CHART SECTION WITH WRAPPER -->

<div class="mb-6">
`<div id="chart-wrapper" class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Grafik User Aktif per Minggu</h2>
        <canvas id="userChart" class="bg-white p-4 rounded shadow-md"></canvas>
        <button onclick="downloadChartPDF()" class="mt-4 px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
    Unduh PDF
</button>
    </div>
       </div>
    @endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    const ctx = document.getElementById('userChart').getContext('2d');
    const userChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                @foreach ($chartData as $data)
                    '{{ $data->minggu }} - {{ $data->bulan }}',
                @endforeach
            ],
            datasets: [{
                label: 'User Aktif',
                data: [
                    @foreach ($chartData as $data)
                        {{ $data->user_aktif }},
                    @endforeach
                ],
                backgroundColor: '#10b981'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    function downloadChartPDF() {
        const element = document.getElementById('chart-wrapper');

        const opt = {
            margin: 0.5,
            filename: 'chart_user_aktif.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
        };

        html2pdf().set(opt).from(element).save();
    }
</script>

@endpush
  </div>

</body>