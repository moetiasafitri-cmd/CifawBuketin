<!DOCTYPE html>
<html>
<head>
    <title>Order Details - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <h1><i class="fas fa-file-invoice"></i> ORDER DETAILS</h1>
        <p>Detail pesanan #{{ $order->id }}</p>
    </div>

    <div class="container">
        <a href="{{ route('admin.orders') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Orders
        </a>

        <div class="order-card">
            <h2>Order Information</h2>
            <div class="order-info">
                <div><strong>Order ID:</strong> #{{ $order->id }}</div>
                <div><strong>Status:</strong> <span class="status-{{ $order->status }}">{{ strtoupper($order->status) }}</span></div>
                <div><strong>Customer:</strong> {{ $order->user->name ?? 'Guest' }}</div>
                <div><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</div>
                <div><strong>Total Amount:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
                <div><strong>Order Date:</strong> {{ $order->created_at->format('d M Y H:i') }}</div>
            </div>

            @if($order->status == 'pending')
            <form action="{{ route('admin.order.accept', $order->id) }}" method="POST">
                @csrf
                <button type="submit" style="background: #27ae60; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    <i class="fas fa-check"></i> Accept Order
                </button>
            </form>
            @endif
        </div>

        <div class="order-card">
            <h2>Order Items</h2>
            <div class="order-items">
                <div class="item-row item-header">
                    <div>Product</div>
                    <div>Quantity</div>
                    <div>Price</div>
                    <div>Subtotal</div>
                </div>
                
                @foreach($order->orderItems as $item)
                <div class="item-row">
                    <div>{{ $item->product->name ?? 'Product' }}</div>
                    <div>{{ $item->quantity }}</div>
                    <div>Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                    <div>Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</div>
                </div>
                @endforeach
                
                <div class="item-row" style="font-weight: bold; border-top: 2px solid var(--maroon);">
                    <div colspan="3" style="text-align: right;">Total:</div>
                    <div>Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root { --maroon: #800000; --maroon-dark: #600000; }
        body { font-family: 'Segoe UI', Arial; margin: 0; padding: 0; background: #f5f5f5; }
        .header { background: linear-gradient(135deg, var(--maroon), var(--maroon-dark)); color: white; padding: 20px 0; text-align: center; }
        .container { max-width: 1000px; margin: 0 auto; padding: 20px; }
        .back-btn { background: var(--maroon); color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-bottom: 20px; display: inline-block; }
        .order-card { background: white; border-radius: 10px; padding: 25px; box-shadow: 0 2px 15px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .order-info { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px; }
        .order-items { margin-top: 20px; }
        .item-row { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; padding: 10px; border-bottom: 1px solid #eee; }
        .item-header { background: var(--maroon); color: white; font-weight: bold; }
        .status-accepted { color: #27ae60; font-weight: bold; }
        .status-pending { color: #e74c3c; font-weight: bold; }
    </style>
</body>
</html>