<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">Login JatimGO</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" name="username" placeholder="Username" required class="w-full p-2 border rounded mb-3">
            <input type="password" name="password" placeholder="Password" required class="w-full p-2 border rounded mb-4">
            <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white py-2 rounded">Masuk</button>
        </form>
    </div>

</body>
</html>
