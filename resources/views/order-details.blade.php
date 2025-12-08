<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan {{ $product['name'] }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Times New Roman', serif;
        }
        
        body {
            background: #d4b8b8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #4b2c2c;
        }
        
        .container {
            max-width: 500px;
            width: 100%;
        }
        
        .order-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0px 8px 25px rgba(0,0,0,0.15);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 15px 35px rgba(0,0,0,0.25);
        }
        
        .product-section {
            padding: 40px 30px;
            text-align: center;
            background: #4b0000;
            color: white;
            position: relative;
        }
        
        .product-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: #ffd700;
        }
        
        .product-name {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
            color: white;
        }
        
        .product-type {
            font-size: 18px;
            opacity: 0.9;
            margin-bottom: 15px;
            font-style: italic;
            color: #ffd700;
        }
        
        .product-price {
            font-size: 36px;
            font-weight: bold;
            color: #ffd700;
        }
        
        .form-section {
            padding: 40px;
        }
        
        .form-title {
            font-size: 28px;
            font-weight: bold;
            color: #4b0000;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
        }
        
        .form-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: #4b0000;
            border-radius: 2px;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #4b0000;
            font-size: 18px;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #4b0000;
            font-size: 18px;
        }
        
        input {
            width: 100%;
            padding: 15px 15px 15px 50px;
            border: 2px solid #d4b8b8;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s;
            background: white;
            font-family: 'Times New Roman', serif;
            color: #4b2c2c;
        }
        
        input:focus {
            outline: none;
            border-color: #4b0000;
            background: white;
            box-shadow: 0 0 0 3px rgba(75, 0, 0, 0.1);
        }
        
        input::placeholder {
            color: #8b6b6b;
            font-style: italic;
        }
        
        .btn {
            width: 100%;
            padding: 18px;
            border: none;
            border-radius: 12px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 15px;
            font-family: 'Times New Roman', serif;
        }
        
        .btn-whatsapp {
            background: #4b0000;
            color: white;
            border: 2px solid #4b0000;
        }
        
        .btn-whatsapp:hover {
            background: white;
            color: #4b0000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(75, 0, 0, 0.3);
        }
        
        .whatsapp-icon {
            font-size: 24px;
        }
        
        .notification {
            padding: 20px;
            background: #FFF3E4;
            border-radius: 12px;
            text-align: center;
            margin-top: 25px;
            font-size: 16px;
            color: #4b2c2c;
            border: 1px solid #d4b8b8;
        }
        
        .notification i {
            color: #4b0000;
            margin-right: 8px;
        }
        
        .guarantee {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
            font-size: 14px;
            color: #8b6b6b;
        }
        
        .guarantee i {
            color: #4b0000;
        }
        
        .back-link {
            text-align: center;
            margin-top: 25px;
        }
        
        .back-link a {
            color: #4b0000;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            font-size: 18px;
            padding: 10px 20px;
            border: 2px solid #4b0000;
            border-radius: 25px;
        }
        
        .back-link a:hover {
            background: #4b0000;
            color: white;
            transform: translateY(-2px);
        }
        
        @media (max-width: 480px) {
            .container {
                max-width: 100%;
            }
            
            .product-section, .form-section {
                padding: 30px 20px;
            }
            
            .product-name {
                font-size: 28px;
            }
            
            .product-price {
                font-size: 32px;
            }
            
            .form-title {
                font-size: 24px;
            }
            
            input {
                padding: 12px 12px 12px 45px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="order-card">
            <!-- Product Section - Dynamic Data -->
            <div class="product-section">
                <div class="product-name">{{ $product['name'] }}</div>
                <div class="product-type">{{ $product['type'] ?? 'Artificial Flower' }}</div>
                <div class="product-price">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
            </div>
            
            <!-- Form Section -->
<div class="form-section">
    <div class="form-title">Data Pemesanan</div>
    
    <form id="orderForm" action="{{ route('order.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_name" value="{{ $product['name'] }}">
        <input type="hidden" name="product_price" value="{{ $product['price'] }}">
        <input type="hidden" name="product_type" value="{{ $product['type'] ?? 'Artificial Flower' }}">
        
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <div class="input-with-icon">
                <i class="fas fa-user input-icon"></i>
                <input type="text" id="name" name="customer_name" placeholder="Masukkan nama lengkap" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="phone">Nomor WhatsApp</label>
            <div class="input-with-icon">
                <i class="fas fa-phone input-icon"></i>
                <input type="tel" id="phone" name="customer_phone" placeholder="Contoh: 081234567890" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="address">Alamat Lengkap</label>
            <div class="input-with-icon">
                <i class="fas fa-map-marker-alt input-icon"></i>
                <input type="text" id="address" name="customer_address" placeholder="Masukkan alamat lengkap" required>
            </div>
        </div>
        
        <button type="submit" class="btn btn-whatsapp">
            <i class="fab fa-whatsapp whatsapp-icon"></i>
            PESAN VIA WHATSAPP
        </button>
    </form>
    
    <div class="notification">
        <i class="fas fa-info-circle"></i> 
        Klik tombol di atas untuk memesan via WhatsApp
    </div>
    
    <div class="guarantee">
        <i class="fas fa-shield-alt"></i>
        <span>Terjamin - Aman - Terpercaya</span>
    </div>
    
    <div class="back-link">
        <a href="{{ route('catalog') }}">
            <i class="fas fa-arrow-left"></i> Kembali ke Katalog
        </a>
    </div>
</div>

    <script>
    document.getElementById('whatsappBtn').addEventListener('click', function() {
        const name = document.getElementById('name').value;
        const phone = document.getElementById('phone').value;
        const address = document.getElementById('address').value;
        const productName = "{{ $product['name'] }}";
        const productPrice = "{{ $product['price'] }}";
        const productType = "{{ $product['type'] ?? 'Artificial Flower' }}";
        
        if (!name || !phone || !address) {
            alert('Harap isi semua data terlebih dahulu!');
            return;
        }

        // Langsung buka WhatsApp tanpa simpan ke database dulu
        const formattedPrice = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(productPrice);

        let whatsappMessage = `Halo Cifaw Buketin! Saya ingin memesan:\n\n`;
        whatsappMessage += `*PRODUK:* ${productName}\n`;
        whatsappMessage += `*JENIS:* ${productType}\n`;
        whatsappMessage += `*HARGA:* ${formattedPrice}\n\n`;
        whatsappMessage += `*DATA PELANGGAN:*\n`;
        whatsappMessage += `• Nama: ${name}\n`;
        whatsappMessage += `• WhatsApp: ${phone}\n`;
        whatsappMessage += `• Alamat: ${address}\n\n`;
        whatsappMessage += `Saya ingin konfirmasi pemesanan ini. Terima kasih!`;
        
        const encodedMessage = encodeURIComponent(whatsappMessage);
        const phoneNumber = "6282196562082";
        
        // Redirect ke WhatsApp
        window.open(`https://wa.me/${phoneNumber}?text=${encodedMessage}`, '_blank');
        
        // Setelah buka WhatsApp, simpan ke database (optional)
        saveToDatabase(name, phone, address, productName, productPrice);
    });

    // Function untuk simpan ke database (background process)
    async function saveToDatabase(name, phone, address, productName, productPrice) {
        try {
            const response = await fetch('/order/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    customer_name: name,
                    customer_phone: phone,
                    customer_address: address,
                    product_name: productName,
                    product_price: productPrice
                })
            });
            
            const result = await response.json();
            console.log('Save to database result:', result);
        } catch (error) {
            console.log('Gagal simpan ke database, tapi WhatsApp sudah terbuka:', error);
        }
    }
</script>
</body>
</html>