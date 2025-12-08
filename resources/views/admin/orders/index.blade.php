<!DOCTYPE html>
<html>
<head>
    <title>Manage Orders - Admin</title>
    <style>
        :root {
            --maroon: #4b0000;
            --maroon-dark: #4b0000;
        }
        
        body { 
            font-family: 'Segoe UI', Arial, sans-serif; 
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        .header {
            background: linear-gradient(135deg, var(--maroon), var(--maroon-dark));
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .back-btn {
            background: var(--maroon);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            display: inline-block;
        }
        
        .orders-table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        
        .table-header {
            background: var(--maroon);
            color: white;
            padding: 15px;
            font-weight: bold;
        }
        
        .table-row {
            display: grid;
            grid-template-columns: 1fr 2fr 1fr 1fr 1fr;
            padding: 15px;
            border-bottom: 1px solid #eee;
            align-items: center;
        }
        
        .table-row:hover {
            background: #f9f9f9;
        }
        
        .status-pending { color: #e74c3c; font-weight: bold; }
        .status-completed { color: #27ae60; font-weight: bold; }
        .status-processing { color: #f39c12; font-weight: bold; }
        
        .btn-action {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12px;
        }
        
        .btn-accept { background: #27ae60; color: white; }
        .btn-reject { background: #e74c3c; color: white; }
        .btn-view { background: #3498db; color: white; }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><i class="fas fa-list"></i> MANAGE ORDERS</h1>
        <p>Kelola semua pesanan dari customer</p>
    </div>

    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
        </a>

        <div class="orders-table">
            <div class="table-header">
                <div class="table-row">
                    <div>Order ID</div>
                    <div>Customer</div>
                    <div>Total</div>
                    <div>Status</div>
                    <div>Actions</div>
                </div>
            </div>
            
            <div class="table-body">
                @forelse($orders as $order)
                            <div class="table-row">
                <div>#{{ $order->id }}</div>
                <div>
                    <!-- ✅ PERBAIKI: Akses langsung dari order, bukan dari relationship -->
                    <strong>{{ $order->customer_name }}</strong><br>
                    <small>{{ $order->customer_phone }}</small><br>
                    <small>{{ $order->customer_address }}</small>
                </div>
                <div>Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
                <div class="status-{{ $order->status }}">
                    {{ strtoupper($order->status) }}
                </div>
                <div>
                    <a href="{{ route('admin.order.show', $order->id) }}" class="btn-action btn-view">
                        <i class="fas fa-eye"></i> View
                    </a>
                    
                    @if($order->status == 'pending')
                    <form action="{{ route('admin.order.accept', $order->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-action btn-accept">
                            <i class="fas fa-check"></i> Accept
                        </button>
                    </form>
                    @endif
                </div>
            </div>
                @empty
                <div class="empty-state">
                    <i class="fas fa-inbox" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
                    <h3>No Orders Yet</h3>
                    <p>Belum ada pesanan yang masuk</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        @if($orders->hasPages())
        <div style="margin-top: 20px; text-align: center;">
            {{ $orders->links() }}
        </div>
        @endif
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>
</html>