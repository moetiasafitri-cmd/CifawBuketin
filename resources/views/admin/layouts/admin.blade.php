<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>
</nav>

<div class="container py-4">
    @yield('content')
</div>

</body>
</html>
