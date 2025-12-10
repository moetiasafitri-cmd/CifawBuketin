<!DOCTYPE html>
<html>
<head>
    <title>Manage Products - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <h1><i class="fas fa-box"></i> MANAGE PRODUCTS</h1>
        <p>Kelola produk untuk ditampilkan di katalog</p>
    </div>

    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
                <a href="{{ route('admin.dashboard') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
                <a href="{{ route('admin.products.create') }}" class="add-btn">
                    <i class="fas fa-plus"></i> Add New Product
                </a>
            </div>
            
            <div style="color: var(--maroon); font-weight: bold;">
                Total Products: {{ $products->total() }}
            </div>
        </div>

        @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
        @endif

        <div class="products-table">
            <div class="table-header">
                <div class="table-row">
                    <div>Image</div>
                    <div>Name</div>
                    <div>Price</div>
                    <div>Type</div>
                    <div>Status</div>
                    <div>Actions</div>
                </div>
            </div>
            
            <div class="table-body">
                @forelse($products as $product)
                <div class="table-row">
                    <div>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-img">
                        @else
                            <div style="width: 80px; height: 80px; background: #eee; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #666;">
                                No Image
                            </div>
                        @endif
                    </div>
                    <div>
                        <strong>{{ $product->name }}</strong><br>
                        <small style="color: #666;">{{ Str::limit($product->description, 50) }}</small>
                    </div>
                    <div>Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    <div>{{ $product->type }}</div>
                    <div class="status-{{ $product->is_active ? 'active' : 'inactive' }}">
                        {{ $product->is_active ? 'ACTIVE' : 'INACTIVE' }}
                    </div>
                    <div>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn-action btn-view">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-action btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Delete this product?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div style="text-align: center; padding: 40px; color: #666;">
                    <i class="fas fa-box-open" style="font-size: 48px; margin-bottom: 20px;"></i>
                    <h3>No Products Yet</h3>
                    <p>Start by adding your first product</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
        <div style="margin-top: 20px; text-align: center;">
            {{ $products->links() }}
        </div>
        @endif

        <!-- Debug: Tampilkan info -->
        <div style="background: #fff3cd; padding: 10px; margin: 10px 0; border-radius: 5px;">
            <strong>Debug Info:</strong><br>
            Total: {{ $products->total() }} products<br>
            Showing: {{ $products->count() }} on this page<br>
            Current Page: {{ $products->currentPage() }}<br>
            Last Page: {{ $products->lastPage() }}
        </div>
    </div>

    <style>
        :root { --maroon: #4b0000; --maroon-dark: #4b0000; }
        body { font-family: 'Segoe UI', Arial; margin: 0; padding: 0; background: #f5f5f5; }
        .header { background: linear-gradient(135deg, var(--maroon), var(--maroon-dark)); color: white; padding: 20px 0; text-align: center; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .back-btn, .add-btn { background: var(--maroon); color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-bottom: 20px; display: inline-block; }
        .add-btn { background: #27ae60; margin-left: 10px; }
        .products-table { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 15px rgba(0,0,0,0.1); }
        .table-header { background: var(--maroon); color: white; padding: 15px; font-weight: bold; }
        .table-row { display: grid; grid-template-columns: 100px 2fr 1fr 1fr 150px 150px; padding: 15px; border-bottom: 1px solid #eee; align-items: center; }
        .product-img { width: 80px; height: 80px; object-fit: cover; border-radius: 8px; }
        .status-active { color: #27ae60; font-weight: bold; }
        .status-inactive { color: #4b0000; font-weight: bold; }
        .btn-action { padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer; font-size: 12px; margin-right: 5px; }
        .btn-edit { background: #3498db; color: white; }
        .btn-delete { background: #e74c3c; color: white; }
        .btn-view { background: #9b59b6; color: white; }
    </style>
</body>
</html>