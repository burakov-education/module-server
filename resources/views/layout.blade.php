<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goods</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <script defer src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<header>
    <nav class="mt-3 d-flex justify-content-between fs-2">
        @auth
            <a href="{{ route('admin-panel') }}" class="text-primary text-decoration-none">Category</a>
            <a href="{{ route('products.list') }}" class="text-primary text-decoration-none">Goods</a>
            <a href="{{ route('orders') }}" class="text-primary text-decoration-none">Orders</a>

            <div>
                <a href="{{ route('logout') }}" class="login text-decoration-none">Logout</a>
            </div>
        @endauth

        @guest
            <div>
                <a href="{{ route('login') }}" class="login text-decoration-none">Login</a>
            </div>
        @endguest
    </nav>
    <h1 class="d-flex justify-content-center pt-3">Goods</h1>
</header>
<main>

    @yield('content')

</main>

</body>
</html>
