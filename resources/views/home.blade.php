<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cifaw Buketin - Home</title>
    <link rel="stylesheet" 
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

{{-- ============================ NAVBAR ============================ --}}
<header class="main-header">
    <nav class="navbar">
        <div class="container-nav">
            {{-- LOGO KIRI POJOK --}}
            <div class="nav-logo">
                <a href="{{ url('/') }}" class="logo-link">
                    <img src="{{ asset('images/logoo.jpg') }}" alt="Cifaw Buketin Logo" class="logo-img">
                </a>
            </div>
            
            {{-- MENU TENGAH --}}
            <ul class="nav-menu-center">
                <li><a href="{{ route('catalog') }}">Catalog</a></li>
                <li><a href="#category">Category</a></li>
                <li><a href="#how-to-order">How To Order</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            
            {{-- LOGIN BUTTON KANAN --}}
            <div class="nav-menu-right">
                <a href="{{ route('login') }}" class="login-btn" title="Admin Login">
                    <i class="fas fa-user-circle"></i>
                    <span class="login-text">Login</span>
                </a>
            </div>
        </div>
    </nav>
</header>


{{-- ============================ HERO ============================ --}}
<section class="hero-section"></section>


{{-- ============================ CATALOG ============================ --}}
<section id="catalog" class="catalog-section">

    <h2 class="section-title">Catalog</h2>

    <div class="catalog-scroll">

        {{-- Jika ada produk --}}
        @if(isset($products) && $products->count() > 0)
            @foreach($products as $index => $product)
            <div class="catalog-card" style="--i: {{ $index }};">
                <div class="card-inner">

                    {{-- Depan --}}
                    <div class="card-front">
                        <img src="{{ $product->image 
                            ? asset('storage/'.$product->image) 
                            : asset('images/default-product.jpg') }}"
                            alt="{{ $product->name }}"
                            onerror="this.onerror=null; this.src='{{ asset('images/default-product.jpg') }}'">
                    </div>

                    {{-- Belakang --}}
                    <div class="card-back">
                        <h3>{{ $product->name }}</h3>
                        <p class="product-type">{{ $product->type ?? $product->category ?? 'Artificial Flower' }}</p>
                        <div class="product-price">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        {{-- Jika tidak ada produk – fallback --}}
        @else
            @php
                $fallbacks = [
                    ['Buket Bunga Mawar', 'Artificial Flower', '175000'],
                    ['Money Bucket Luxury', 'Money', '250000'],
                    ['Photo Bucket Memory', 'Photo', '195000'],
                    ['Butterfly Bucket Dream', 'Butterfly', '225000'],
                    ['Snack Bucket Delight', 'Snack', '180000'],
                ];
            @endphp

            @foreach($fallbacks as $index => $item)
            <div class="catalog-card" style="--i: {{ $index }};">
                <div class="card-inner">
                    <div class="card-front">
                        <img src="{{ asset('images/default-product.jpg') }}">
                    </div>
                    <div class="card-back">
                        <h3>{{ $item[0] }}</h3>
                        <p class="product-type">{{ $item[1] }}</p>
                        <div class="product-price">
                            Rp {{ number_format($item[2], 0, ',', '.') }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif

    </div>

    <a href="{{ route('catalog') }}" class="arrow-btn">→</a>

</section>


{{-- ============================ CATEGORY ============================ --}}
<section id="category" class="category-section">

    <h2 class="section-title">Category</h2>

    <ul class="category-list">
        @if(isset($categories) && count($categories) > 0)
            @foreach($categories as $category)
                <li>{{ $category }}</li>
            @endforeach
        @else
            <li>Artificial Flower Bucket</li>
            <li>Butterfly Bucket</li>
            <li>Money Bucket</li>
            <li>Photo Bucket</li>
            <li>Revision Bucket</li>
            <li>Snack Bucket</li>
        @endif
    </ul>

</section>


{{-- ============================ HOW TO ORDER ============================ --}}
<section id="how-to-order" class="how-to-order-section">

    <div class="container how-to-order-container">

        <div class="how-to-order-title-wrapper">
            <h2 class="how-to-order-title">How To Order ?</h2>
        </div>

        <div class="steps-wrapper">
            <div class="steps-container">

                @php
                $steps = [
                    'Hubungi admin WhatsApp Cifawbuketin',
                    'Kirim katalog model yang diinginkan',
                    'Pembayaran DP min 50% dari harga buket',
                    'Isi format order yang diberikan, pesanan akan di save oleh admin',
                    'Proses 1-4 hari kerja sesuai antrian',
                    'Buket revisi proses 7 hari kerja',
                    'Konfirmasi hasil buket akan dikirim melalui foto hasil rangkalan',
                    'Bisa diambil di tempat atau COD'
                ];
                @endphp

                @foreach($steps as $i => $text)
                <div class="step-item">
                    <span class="step-number">{{ $i + 1 }}</span>
                    <span class="step-text">{{ $text }}</span>
                </div>
                @endforeach

            </div>
        </div>

    </div>

</section>


{{-- ============================ CONTACT ============================ --}}
<section id="contact" class="booking-section">
    <div class="booking">
        <a class="whatsapp-button" 
           href="https://wa.me/6282196562082" target="_blank">
           WhatsApp
        </a>
    </div>
</section>


{{-- ============================ FOOTER ============================ --}}
<footer class="footer">

    <div class="footer-container">

        <div class="footer-col">
            <h3>Social Media</h3>
            <p>WhatsApp</p>
            <p>Instagram</p>
            <p>TikTok</p>
        </div>

        <div class="footer-col">
            <h3>Category</h3>
            @if(isset($categories) && count($categories) > 0)
                @foreach($categories as $category)
                    <p>{{ $category }}</p>
                @endforeach
            @else
                <p>Artificial Bucket</p>
                <p>Butterfly Bucket</p>
                <p>Money Bucket</p>
                <p>Photo Bucket</p>
                <p>Revision Bucket</p>
                <p>Snack Bucket</p>
            @endif
        </div>

        <div class="footer-col">
            <h3>Payment</h3>
            <p>SeaBank</p>
            <p>ShopeePay</p>
        </div>

    </div>

    <p class="copyright">
        © 2025 Cifaw Buketin Aja — All Rights Reserved
    </p>

</footer>


<style>
/* GLOBAL */
body { margin:0; font-family:'Times New Roman', serif; color:#4b2c2c; }

/* NAVBAR */
.main-header { 
    background:#4b0000; 
    padding:12px 0; /* Sedikit dikurangi untuk logo */
    position:fixed; 
    width:100%; 
    z-index:999;
    box-shadow: 0 2px 15px rgba(0,0,0,0.2);
}

.container-nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* LOGO KIRI POJOK */
.nav-logo {
    display: flex;
    align-items: center;
    margin-right: 30px;
}

.logo-link {
    display: flex;
    align-items: center;
    text-decoration: none;
}

.logo-img {
    height: 50px; /* Ukuran logo disesuaikan dengan tinggi navbar */
    width: auto;
    border-radius: 6px;
    object-fit: contain;
    transition: transform 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

.logo-img:hover {
    transform: scale(1.05);
}

/* MENU TENGAH */
.nav-menu-center { 
    list-style:none; 
    display:flex; 
    gap:40px; 
    margin:0; 
    padding:0;
    align-items: center;
    flex: 1;
    justify-content: center;
}

.nav-menu-center li a { 
    color:white; 
    font-size:20px; /* Sedikit dikurangi untuk logo */
    font-weight:bold; 
    text-decoration:none; 
    transition: all 0.3s ease;
    padding: 8px 0;
    position: relative;
}

.nav-menu-center li a:hover { 
    color: #ffd700;
}

/* Underline effect pada hover */
.nav-menu-center li a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 3px;
    background: #ffd700;
    left: 0;
    bottom: -5px;
    transition: width 0.3s ease;
}

.nav-menu-center li a:hover::after {
    width: 100%;
}

/* LOGIN BUTTON KANAN */
.nav-menu-right {
    display: flex;
    align-items: center;
    margin-left: 30px;
}

.login-btn {
    background: rgba(255, 255, 255, 0.15);
    color: white;
    text-decoration: none;
    padding: 10px 25px;
    border-radius: 30px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 18px;
    font-weight: bold;
    transition: all 0.3s ease;
}

.login-btn:hover {
    background: rgba(255, 255, 255, 0.25);
    border-color: #ffd700;
    color: #ffd700;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.2);
}

.login-btn .fa-user-circle {
    font-size: 24px;
    transition: transform 0.3s ease;
}

.login-btn:hover .fa-user-circle {
    transform: scale(1.1) rotate(10deg);
    color: #ffd700;
}

/* HERO - adjust padding karena navbar ada logo */
.hero-section { 
    height:100vh; 
    background:url('{{ asset("images/hero-bg.jpg") }}') center/cover no-repeat; 
    padding-top:75px;
    position: relative; /* tambah ini */
}


.hero-section::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 120px; 
    background: linear-gradient(
        to bottom, 
        transparent, 
        #f9f5f0
    );
    pointer-events: none;
}


/* ... SISA CSS SAMA TIDAK DIUBAH ... */

/* CATALOG */
.catalog-section { 
    padding:80px 0 60px;
    text-align:center; 
    position: relative;
    overflow: hidden;
    background: #f9f5f0;
}
.catalog-section::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 120px; /* sesuaikan */
    background: linear-gradient(
        to bottom,
        transparent,
        #ffffff   /* atau warna background kategori */
    );
    pointer-events: none;
}

.section-title { 
    font-size:48px; 
    margin-bottom:40px; 
    font-weight:bold; 
    color:#4b0000; 
    opacity: 0;
    transform: translateY(-30px);
    animation: titleSlideDown 1s ease 0.5s forwards;
}
@keyframes titleSlideDown {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.catalog-scroll { 
    display:flex; 
    overflow-x:auto; 
    gap:30px; 
    padding:0 40px 20px; 
    scroll-behavior:smooth; 
    perspective: 1000px;
}
.catalog-scroll::-webkit-scrollbar { height:10px; }
.catalog-scroll::-webkit-scrollbar-thumb { background:#b88a8a; border-radius:10px; }

/* ANIMASI CARD */
.catalog-card { 
    min-width:300px; 
    text-align:center;
    perspective: 1000px;
    cursor: pointer;
    opacity: 0;
    transform: translateY(100px) rotateX(-45deg);
    animation: cardEntrance 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    animation-delay: calc(var(--i, 0) * 0.1s);
}
@keyframes cardEntrance {
    to {
        opacity: 1;
        transform: translateY(0) rotateX(0);
    }
}

.card-inner {
    position: relative;
    width: 100%;
    height: 350px;
    transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transform-style: preserve-3d;
    border-radius: 28px;
}
.catalog-card:hover .card-inner {
    transform: rotateY(180deg);
}
.card-front, .card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border-radius: 28px;
    box-shadow: 0px 6px 18px rgba(0,0,0,0.25);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    box-sizing: border-box;
}
.card-front {
    background: white;
}
.card-back {
    background: linear-gradient(135deg, #4b0000, #6b0000);
    color: white;
    transform: rotateY(180deg);
    text-align: center;
    justify-content: center;
}
.card-back h3 {
    font-size: 24px;
    margin-bottom: 10px;
    color: white;
    font-weight: bold;
}
.product-type {
    font-size: 18px;
    margin-bottom: 15px;
    opacity: 0.9;
    font-style: italic;
}
.product-price {
    font-size: 22px;
    font-weight: bold;
    color: #ffd700;
    letter-spacing: 0.5px;
}
.catalog-card img { 
    width:250px; 
    height:250px; 
    object-fit:cover; 
    border-radius:20px; 
}

.arrow-btn { 
    font-size:60px; 
    margin-top:28px; 
    display:inline-block; 
    color:#4b0000; 
    text-decoration:none; 
    transition: all 0.5s ease;
    position: relative;
    overflow: hidden;
}
.arrow-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s ease;
}
.arrow-btn:hover {
    transform: translateX(10px);
    color: #6b0000;
}
.arrow-btn:hover::before {
    left: 100%;
}

/* CATEGORY */
.category-section {
    padding: 80px 0;
    background: white;
    position: relative;
}
.category-section::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 120px; /* bisa disesuaikan */
    background: linear-gradient(
        to bottom,
        transparent,
        #f9f5f0  
    );
    pointer-events: none;
}
.category-list { 
    width:70%; 
    margin:auto; 
    padding:0; 
}
.category-list li { 
    list-style:none; 
    font-size:28px; 
    padding:16px 0; 
    border-bottom:2px solid #d4b8b8; 
    opacity: 0;
    transform: translateX(-50px);
    transition: all 0.6s ease;
}
.category-list li.animate {
    opacity: 1;
    transform: translateX(0);
}
.category-list li:nth-child(even) {
    transform: translateX(50px);
}
.category-list li:nth-child(even).animate {
    transform: translateX(0);
}

/* HOW TO ORDER */
.how-to-order-section { 
    background:#fff3e4; 
    padding-top:80px;
    padding-bottom:80px;
}

.how-to-order-container {
    display: flex;
    align-items: flex-start;
    gap: 60px;
    max-width: 1200px;
    margin: 0 auto;
}

.how-to-order-title-wrapper {
    flex: 1;
    position: sticky;
    top: 120px;
}

.how-to-order-title {
    font-size: 64px;
    font-weight: bold;
    color: #4b0000;
    margin: 0;
    text-align: left;
    font-style: italic;
    line-height: 1.1;
}

.steps-wrapper {
    flex: 1.5;
}

.steps-container {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.step-item {
    display: flex;
    align-items: flex-start;
    padding: 12px 0;
    opacity: 0;
    transform: translateX(30px);
    transition: all 0.6s ease;
}

.step-item.animate {
    opacity: 1;
    transform: translateX(0);
}

.step-number {
    background: #4b0000;
    color: white;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: bold;
    margin-right: 20px;
    flex-shrink: 0;
    margin-top: 2px;
    transition: transform 0.3s ease;
}

.step-item:hover .step-number {
    transform: scale(1.1) rotate(10deg);
}

.step-text {
    font-size: 18px;
    line-height: 1.5;
    color: #4b2c2c;
    font-weight: 500;
    transition: color 0.3s ease;
}

.step-item:hover .step-text {
    color: #4b0000;
}

/* CONTACT */
.booking-section {
    background: url('{{ asset("images/book-bg.jpg") }}') center/cover no-repeat;
    height:60vh;
    display:flex; 
    justify-content:center; 
    align-items:center; 
    text-align:center;
    position: relative;
}
.booking-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(75, 0, 0, 0.1);
}
.booking-overlay { 
    background:rgba(255,255,255,0.85); 
    padding:60px 80px; 
    width:55%; 
    margin:auto; 
    border-radius:18px; 
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.8s ease;
    position: relative;
    z-index: 1;
}
.booking-overlay.animate {
    opacity: 1;
    transform: translateY(0);
}
.booking-title { 
    font-size:36px; 
    margin-bottom:30px; 
    color:#4b0000; 
    font-weight:bold; 
}
.booking-title em {
    font-style: italic;
    font-weight: bold;
}
.whatsapp-button { 
    background:#4b0000; 
    padding:18px 45px; 
    font-size:26px; 
    font-weight:bold; 
    color:white; 
    text-decoration:none; 
    border-radius:12px; 
    display: inline-block;
    transition: all 0.3s ease;
    transform: scale(1);
}
.whatsapp-button:hover {
    background: #6b0000;
    color: white;
    transform: scale(1.05);
}

/* FOOTER */
.footer { 
    background:#FFF3E4; 
    padding:70px 0 25px; 
}
.footer-container { 
    display:grid; 
    grid-template-columns:repeat(3,1fr); 
    width:90%; 
    margin:auto; 
    gap:20px; 
}
.footer-col h3 { 
    font-size:28px; 
    color:#4b0000; 
    margin-bottom: 15px;
}
.footer-col p { 
    font-size:18px; 
    margin:8px 0;
    color: #4b2c2c;
    transition: color 0.3s;
}
.footer-col p:hover {
    color: #4b0000;
}
.copyright {
    text-align: center;
    margin-top: 40px;
    font-size: 16px;
    color: #4b2c2c;
}

/* RESPONSIVE */
@media (max-width: 992px) {
    .container-nav {
        padding: 0 15px;
    }
    
    .nav-menu-center {
        gap: 25px;
    }
    
    .nav-menu-center li a {
        font-size: 18px;
    }
    
    .login-btn {
        padding: 8px 20px;
        font-size: 16px;
    }
    
    .logo-img {
        height: 45px;
    }
}

@media (max-width: 768px) {
    .container-nav {
        padding: 0 10px;
    }
    
    .nav-menu-center {
        gap: 15px;
    }
    
    .nav-menu-center li a {
        font-size: 16px;
    }
    
    .login-text {
        display: none; 
    }
    
    .login-btn {
        padding: 8px 15px;
    }
    
    .login-btn .fa-user-circle {
        font-size: 22px;
        margin-right: 0;
    }
    
    .logo-img {
        height: 40px;
    }
    
    .nav-logo {
        margin-right: 15px;
    }
    
    .nav-menu-right {
        margin-left: 15px;
    }
    
    .catalog-section {
        padding: 60px 0 40px;
    }
    
    .category-section {
        padding: 60px 0;
    }
    
    .how-to-order-section {
        padding: 60px 0;
    }
    
    .how-to-order-container {
        flex-direction: column;
        gap: 40px;
    }
    
    .how-to-order-title {
        font-size: 48px;
        text-align: center;
        position: static;
    }
    
    .step-text {
        font-size: 16px;
    }
    
    .booking-overlay {
        width: 90%;
        padding: 40px 20px;
    }
    
    .booking-title {
        font-size: 28px;
    }
    
    .footer-container {
        grid-template-columns: 1fr;
        gap: 30px;
        text-align: center;
    }
    
    .catalog-card {
        min-width: 280px;
    }
    .card-inner {
        height: 320px;
    }
    .catalog-card img {
        width: 220px;
        height: 220px;
    }
    
    .section-title {
        font-size: 36px;
    }
    
    .category-list li {
        font-size: 22px;
    }
    
    .product-price {
        font-size: 20px;
    }
}

@media (max-width: 576px) {
    .nav-menu-center {
        gap: 10px;
    }
    
    .nav-menu-center li a {
        font-size: 14px;
    }
    
    .login-btn {
        padding: 6px 12px;
    }
    
    .login-btn .fa-user-circle {
        font-size: 20px;
    }
    
    .logo-img {
        height: 35px;
    }
    
    /* Untuk mobile kecil, logo ditengah */
    @media (max-width: 480px) {
        .container-nav {
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .nav-logo {
            width: 100%;
            justify-content: center;
            margin-right: 0;
            margin-bottom: 10px;
        }
        
        .nav-menu-center {
            order: 3;
            width: 100%;
            justify-content: center;
            margin-top: 10px;
        }
        
        .nav-menu-right {
            margin-left: 0;
        }
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set index variable untuk animation delay
    const catalogCards = document.querySelectorAll('.catalog-card');
    catalogCards.forEach((card, index) => {
        card.style.setProperty('--i', index);
    });

    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top <= (window.innerHeight * 0.8) &&
            rect.bottom >= 0
        );
    }

    function animateOnScroll() {
        const targets = document.querySelectorAll(
            '.category-list li, .step-item, .booking-overlay'
        );

        targets.forEach(el => {
            if (isElementInViewport(el)) {
                el.classList.add('animate');
            }
        });
    }

    animateOnScroll();

    window.addEventListener('scroll', animateOnScroll);
    window.addEventListener('resize', animateOnScroll);

});
</script>

</body>
</html>