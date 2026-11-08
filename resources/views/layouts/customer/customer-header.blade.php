<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('logo/logo.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            color: #292524;
            background: #faf9f7;
        }

        .fashion-font {
            font-family: 'Playfair Display', serif;
        }

        .announcement {
            background: #292524;
            color: #e9d7c1;
        }

        .hero-section {
            background-image:
                linear-gradient(
                    90deg,
                    rgba(25, 21, 18, .78),
                    rgba(25, 21, 18, .35),
                    rgba(25, 21, 18, .05)
                ),
                url('https://images.unsplash.com/photo-1483985988355-763728e1935b?w=2000');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .section-label {
            color: #a58a6d;
            letter-spacing: 4px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .product-card {
            transition: box-shadow .3s ease;
        }

        .product-card:hover {
            box-shadow: 0 15px 40px rgba(41, 37, 36, .09);
        }

        .product-image {
            transition: transform .6s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.04);
        }

        .category-card img,
        .brand-card img {
            transition: transform .5s ease;
        }

        .category-card:hover img,
        .brand-card:hover img {
            transform: scale(1.05);
        }

        .shop-button {
            transition: all .25s ease;
        }

        .shop-button:hover {
            background: #59483a;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .15);
        }

        .nav-link {
            transition: color .2s ease;
        }

        .nav-link:hover {
            color: #a58a6d;
        }

        .newsletter-section {
            background: #eae3d9;
        }

        .footer-link {
            transition: color .2s ease;
        }

        .footer-link:hover {
            color: #d2b99c;
        }

        @media (max-width: 768px) {
            .hero-section {
                background-position: 60% center;
            }
        }
    </style>
</head>


<body class="bg-gray-50 text-gray-900">
    @include('msg')
    <div class="announcement px-4 py-3 text-center text-[10px] font-semibold uppercase tracking-[2px] sm:text-xs">
        ✦ Discover Your Style | New Collection Available Now ✦
    </div>

    





    @yield('content')


</body>
</html>