<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://images.ctfassets.net/l5fkpck1mwg3/1BROzHq9JQEMn7ZukjTfNX/cbd5765243427fd15fd3405e6cf37bc0/BWW_Web_AW5_10FreeBoneless_ProductImage__PromoCode_4000x3000.png">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body>
    <nav>
        <div class="menu-icon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul class="nav-list">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/products?sort=asc') }}">Products</a></li>
        </ul>
        
        <!-- Auth buttons container -->
        <div class="nav-auth">
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="auth-btn">Login</a>
                <a href="{{ route('register') }}" class="auth-btn">Register</a>
            @endguest
        </div>
    </nav>

    <header>
        <h1>@yield('header')</h1>
    </header>

    <div class="container">
        <section>
            @yield('content')
        </section>
    </div>

    <footer>
        <p>© 2024 Clemson</p>
    </footer>

    <script>
        document.querySelector('.menu-icon').addEventListener('click', function() {
            document.querySelector('.nav-list').classList.toggle('active');
            this.classList.toggle('active');
        });
    </script>
</body>
</html>
