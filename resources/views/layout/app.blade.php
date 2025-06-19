<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>JatimGO - Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a5632',
                        accent: '#4caf50',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    @include('partials.navbar')

    <main class="py-6">
        @yield('content')
    </main>
</body>
@include('partials.footer')
</html>
