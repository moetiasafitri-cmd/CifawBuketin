<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1><i class="fas fa-user-shield"></i> ADMIN DASHBOARD</h1>
        <p>Welcome to your administration panel</p>
    </div>

    <div class="container">
        <!-- Dashboard Cards -->
        <div class="dashboard-cards">
            <div class="card">
                <i class="fas fa-shopping-cart"></i>
                <h3>Total Orders</h3>
                <div class="number">{{ $orderCount }}</div>
            </div>
            
            <div class="card">
                <i class="fas fa-shopping-cart"></i>
                <h3>Total Orders</h3>
                <div class="number">{{ $orderCount }}</div>
                <a href="{{ route('admin.orders') }}" style="display: block; margin-top: 10px; color: var(--maroon);">
                    View All →
                </a>
            </div>
            
            <div class="card">
                <i class="fas fa-check-circle"></i>
                <h3>Completed Orders</h3>
                <div class="number">{{ $orderCount - $pendingCount }}</div>
            </div>
            
            <div class="card">
                <i class="fas fa-chart-line"></i>
                <h3>Success Rate</h3>
                <div class="number">
                    @if($orderCount > 0)
                        {{ round((($orderCount - $pendingCount) / $orderCount) * 100) }}%
                    @else
                        0%
                    @endif
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="nav-buttons">
            <a href="{{ route('admin.orders') }}" class="nav-btn">
                <i class="fas fa-list"></i> Manage Orders
            </a>
             <a href="{{ route('admin.products.index') }}" class="nav-btn">
                <i class="fas fa-box"></i> Manage Products
            </a>
        </div>

        <!-- User Information -->
        <div class="user-info">
            <h2><i class="fas fa-user-circle"></i> USER INFORMATION</h2>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div><strong>ID:</strong> {{ Auth::user()->id }}</div>
                <div><strong>Name:</strong> {{ Auth::user()->name }}</div>
                <div><strong>Email:</strong> {{ Auth::user()->email }}</div>
                <div><strong>Role:</strong> <span style="color: var(--maroon); font-weight: bold;">{{ Auth::user()->role }}</span></div>
                <div><strong>Login Time:</strong> {{ now()->format('Y-m-d H:i:s') }}</div>
                <div><strong>Status:</strong> <span style="color: #28a745; font-weight: bold;">Active</span></div>
            </div>
        </div>

        <!-- Logout Button -->
        <div style="text-align: center; margin: 30px 0;">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> LOGOUT
                </button>
            </form>
        </div>
    </div>

    <style>
        :root {
            --maroon: #4b0000;
            --maroon-dark: #600000;
            --maroon-light: #4b0000;
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
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            border-top: 4px solid var(--maroon);
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card i {
            font-size: 2.5em;
            color: var(--maroon);
            margin-bottom: 15px;
        }
        
        .card h3 {
            color: var(--dark);
            margin: 10px 0;
        }
        
        .card .number {
            font-size: 2em;
            font-weight: bold;
            color: var(--maroon);
        }
        
        .user-info {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            margin: 30px 0;
            border-left: 4px solid var(--maroon);
        }
        
        .nav-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin: 30px 0;
        }
        
        .nav-btn {
            background: white;
            border: 2px solid var(--maroon);
            color: var(--maroon);
            padding: 15px;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .nav-btn:hover {
            background: var(--maroon);
            color: white;
        }
        
        .logout-btn {
            background: #4b0000;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .logout-btn:hover {
            background: #4b0000;
            transform: scale(1.05);
        }
        
        @media (max-width: 768px) {
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</body>
</html>