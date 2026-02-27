<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/landing_page.css') }}">
    {{-- Box Icons --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css">

    <title>CMU | SOMS</title>
</head>

<body>
    {{-- Navbar --}}
    <header>
        <a href="#" class="logo"><img src="{{ asset('images/cmu.png') }}" alt="cmu logo"><span>Student Organization Management System</span></a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        </ul>
    </header>

    <section class="home" id="home">
        <div class="home-text">
            <span>Welcome to</span>
            <h1>Central Mindanao University</h1>
            <h2>Office of Student Affairs and Services</h2>
            <a href="#" class="btn">Register now</a>
        </div>
        <div class="home-img">
            <img src="{{ asset('images/osa.png') }}" alt="OSA logo">
        </div>
    </section>
    <section class="shop" id="shop">
        <div class="heading">
            <span>Show Now</span>
            <h1>Shop Coffee</h1>
        </div>
    </section>


    <script src="{{ asset('js/landing_page.js') }}"></script>
</body>

</html>
