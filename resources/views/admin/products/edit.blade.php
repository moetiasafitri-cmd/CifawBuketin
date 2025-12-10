<!DOCTYPE html>
<html>
<head>
    <title>Edit Product - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <h1><i class="fas fa-edit"></i> EDIT PRODUCT</h1>
        <p>Edit produk: {{ $product->name }}</p>
    </div>

    <div class="container">
        <a href="{{ route('admin.products.index') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Products
        </a>

        <div class="form-card">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Product Name *</label>
                    <input type="text" id="name" name="name" required value="{{ old('name', $product->name) }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price *</label>
                    <input type="number" id="price" name="price" required value="{{ old('price', $product->price) }}" min="0">
                </div>

                <div class="form-group">
                    <label for="type">Type *</label>
                    <select id="type" name="type" required>
                        <option value="Artificial Flower" {{ $product->type == 'Artificial Flower' ? 'selected' : '' }}>Artificial Flower</option>
                        <option value="Butterfly" {{ $product->type == 'Butterfly' ? 'selected' : '' }}>Butterfly</option>
                        <option value="Money" {{ $product->type == 'Money' ? 'selected' : '' }}>Money</option>
                        <option value="Photo" {{ $product->type == 'Photo' ? 'selected' : '' }}>Photo</option>
                        <option value="Snack" {{ $product->type == 'Snack' ? 'selected' : '' }}>Snack</option>
                        <option value="Revision" {{ $product->type == 'Revision' ? 'selected' : '' }}>Revision</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <small>Max 2MB, Format: JPEG, PNG, JPG, GIF</small>
                    
                    @if($product->image)
                    <div class="current-image">
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-img">
                    </div>
                    @endif
                </div>

                <div class="form-group checkbox-group">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ $product->is_active ? 'checked' : '' }}>
                    <label for="is_active" style="margin: 0;">Active Product</label>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Update Product
                </button>
            </form>
        </div>
    </div>

    <style>
        :root { --maroon: #4b0000; --maroon-dark: #4b0000; }
        body { font-family: 'Segoe UI', Arial; margin: 0; padding: 0; background: #f5f5f5; }
        .header { background: linear-gradient(135deg, var(--maroon), var(--maroon-dark)); color: white; padding: 20px 0; text-align: center; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }
        .back-btn { background: var(--maroon); color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-bottom: 20px; display: inline-block; }
        .form-card { background: white; border-radius: 10px; padding: 30px; box-shadow: 0 2px 15px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: var(--maroon); }
        input, textarea, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px; }
        textarea { min-height: 100px; }
        .btn-submit { background: var(--maroon); color: white; padding: 12px 30px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        .current-image { margin-top: 10px; }
        .product-img { width: 150px; height: 150px; object-fit: cover; border-radius: 8px; }
        .checkbox-group { display: flex; align-items: center; gap: 10px; }
    </style>
</body>
</html>