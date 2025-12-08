<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="flex">
        <aside class="w-64 h-screen bg-white shadow px-4 py-8">
            <h2 class="text-xl font-bold mb-4">Admin Menu</h2>

            <ul>
                <li><a class="block py-2" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a class="block py-2" href="{{ route('admin.orders') }}">Pesanan</a></li>
                <li><a class="block py-2" href="{{ route('admin.catalog.index') }}">Catalog</a></li>
                <li><a class="block py-2" href="{{ route('admin.home.edit') }}">Edit Home</a></li>
            </ul>
        </aside>

        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
