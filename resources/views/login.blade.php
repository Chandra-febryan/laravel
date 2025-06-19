<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover flex items-center justify-center min-h-screen"style="background-image: url('{{ asset('images/THUMBS.jpg') }}');">

    <div class="w-full max-w-md bg-white p-6 rounded shadow">
        <h4 class="text-2xl font-semibold text-green-700 mb-6 text-center">Selamat Datang di</h4>
        <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">JatimGO</h2>
        <p class=" text-gray-700 mb-6 text-center">Silahkan Login Untuk Melanjutkan</p>
@section('content')
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
            <label for="tanggal" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" placeholder="" required class="w-full p-2 border rounded mb-3"></div>
            <div>
            <label for="tanggal" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" placeholder="" required class="w-full p-2 border rounded mb-4">
            </div>
            <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white py-2 rounded">Masuk</button>
        </form>
    </div>
</body>
</html>
