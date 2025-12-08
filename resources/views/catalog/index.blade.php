<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog - Cifaw Buketin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* RESET & GLOBAL */
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            box-sizing: border-box;
            overflow-x: hidden;
            font-family: 'Times New Roman', serif;
            color: #4b2c2c;
            background: #f9f5f0;
        }

        /* HEADER */
        .main-header {
            background: #4b0000;
            padding: 15px 0 !important;
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .back-button {
            color: white;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .back-button:hover {
            opacity: 0.8;
        }

        .header-title {
            color: white;
            font-size: 32px;
            font-weight: bold;
            margin: 0;
        }

        .header-spacer {
            width: 45px;
            visibility: hidden;
        }

        /* CATALOG GRID */
        .catalog-container {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 15px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.25);
        }

        .product-img {
            height: 250px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .product-type-badge {
            position: absolute;
            bottom: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.95);
            color: #4b0000;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            backdrop-filter: blur(5px);
            border: 1px solid #4b0000;
        }

        .product-info {
            padding: 25px;
            text-align: center;
        }

        .product-name {
            font-size: 24px;
            font-weight: bold;
            color: #4b0000;
            margin-bottom: 8px;
        }

        .product-desc {
            font-size: 16px;
            color: #8b6b6b;
            margin-bottom: 20px;
            line-height: 1.5;
            min-height: 48px;
        }

        .product-price {
            font-size: 22px;
            font-weight: bold;
            color: #4b0000;
            margin-bottom: 25px;
        }

        .order-button {
            display: inline-block;
            background: #4b0000;
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s ease;
            border: 2px solid #4b0000;
        }

        .order-button:hover {
            background: white;
            color: #4b0000;
            transform: scale(1.05);
        }

        /* FOOTER */
        .footer {
            background: #FFF3E4;
            padding: 70px 0 25px;
            margin-top: 50px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-col h3 {
            font-size: 24px;
            color: #4b0000;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .footer-col p {
            font-size: 18px;
            margin: 8px 0;
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
            font-weight: bold;
        }

        /* NO PRODUCTS MESSAGE */
        .no-products {
            text-align: center;
            padding: 80px 20px;
            color: #666;
        }

        .no-products i {
            font-size: 60px;
            margin-bottom: 20px;
            color: #ccc;
        }

        /* LOADING ANIMATION */
        .product-card {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Staggered animation delays */
        .product-card:nth-child(1) { animation-delay: 0.1s; }
        .product-card:nth-child(2) { animation-delay: 0.2s; }
        .product-card:nth-child(3) { animation-delay: 0.3s; }
        .product-card:nth-child(4) { animation-delay: 0.4s; }
        .product-card:nth-child(5) { animation-delay: 0.5s; }
        .product-card:nth-child(6) { animation-delay: 0.6s; }
        .product-card:nth-child(7) { animation-delay: 0.7s; }
        .product-card:nth-child(8) { animation-delay: 0.8s; }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .header-title {
                font-size: 28px;
            }
            
            .product-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .product-img {
                height: 220px;
            }
            
            .product-info {
                padding: 20px;
            }
            
            .product-name {
                font-size: 22px;
            }
            
            .footer-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 40px;
            }
            
            .catalog-container {
                width: 95%;
                padding: 0 10px;
            }
        }

        @media (max-width: 480px) {
            .header-container {
                width: 95%;
            }
            
            .header-title {
                font-size: 24px;
            }
            
            .back-button {
                font-size: 18px;
            }
            
            .product-img {
                height: 200px;
            }
            
            .order-button {
                padding: 10px 25px;
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    {{-- HEADER --}}
    <header class="main-header">
        <div class="header-container">
            <a href="{{ route('home') }}" class="back-button">← Back</a>
            <h1 class="header-title">Catalog</h1>
            <span class="header-spacer"></span>
        </div>
    </header>

    {{-- CATALOG CONTENT --}}
    <main class="catalog-container">
      @if(isset($products) && count($products) > 0)
    <div class="product-grid">
        @foreach($products as $product)
        <div class="product-card">
            <div class="product-img" 
                 style="background-image: url('{{ (is_array($product) ? asset('images/' . ($product['image'] ?? 'default-product.jpg')) : ($product->image ? asset('storage/' . $product->image) : asset('images/default-product.jpg'))) }}');">
                <div class="product-type-badge">
                    {{ is_array($product) ? ($product['type'] ?? 'Artificial Flower') : ($product->type ?? 'Artificial Flower') }}
                </div>
            </div>
            <div class="product-info">
                <h3 class="product-name">{{ is_array($product) ? $product['name'] : $product->name }}</h3>
                <p class="product-desc">{{ is_array($product) ? ($product['description'] ?? 'Tidak ada deskripsi tersedia') : ($product->description ?? 'Tidak ada deskripsi tersedia') }}</p>
                <div class="product-price">Rp {{ number_format(is_array($product) ? $product['price'] : $product->price, 0, ',', '.') }}</div>
                <a href="{{ route('order.details', is_array($product) ? $product['id'] : $product->id) }}" class="order-button">
                    <i class="fas fa-shopping-cart"></i> PESAN SEKARANG
                </a>
            </div>
        </div>
        @endforeach
    </div>
@else
    {{-- NO PRODUCTS MESSAGE --}}
    <div class="no-products">
        <i class="fas fa-box-open"></i>
        <h2>Belum Ada Produk Tersedia</h2>
        <p>Silakan kembali lagi nanti atau hubungi admin via WhatsApp</p>
        <a href="https://wa.me/6282196562082" class="order-button" style="margin-top: 20px;">
            <i class="fab fa-whatsapp"></i> Hubungi WhatsApp
        </a>
    </div>
@endif

    {{-- FOOTER --}}
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
                <p>Artificial Bucket</p>
                <p>Butterfly Bucket</p>
                <p>Money Bucket</p>
                <p>Photo Bucket</p>
                <p>Revision Bucket</p>
                <p>Snack Bucket</p>
            </div>
            <div class="footer-col">
                <h3>Payment</h3>
                <p>SeaBank</p>
                <p>ShopeePay</p>
            </div>
        </div>
        <p class="copyright">© 2025 Cifaw Buketin Aja — All Rights Reserved</p>
    </footer>

    <script>
        // Simple scroll animation trigger
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.product-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, { 
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            productCards.forEach(card => observer.observe(card));
        });
    </script>
</body>
</html>