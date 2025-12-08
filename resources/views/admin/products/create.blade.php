<!DOCTYPE html>
<html>
<head>
    <title>Add Product - Admin</title>
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
        .checkbox-group { display: flex; align-items: center; gap: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h1><i class="fas fa-plus-circle"></i> ADD NEW PRODUCT</h1>
        <p>Tambahkan produk baru ke katalog</p>
    </div>
<!-- Tambahkan setelah header -->
@if($errors->any())
<div class="container">
    <div style="background: #f8d7da; color: #4b0000; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
        <h4><i class="fas fa-exclamation-triangle"></i> Validation Errors:</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
    <div class="container">
        <a href="{{ route('admin.products.index') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Products
        </a>

        <div class="form-card">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Product Name *</label>
                    <input type="text" id="name" name="name" required value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price *</label>
                    <input type="number" id="price" name="price" required value="{{ old('price') }}" min="0">
                </div>

                <div class="form-group">
                    <label for="type">Type *</label>
                    <select id="type" name="type" required>
                        <option value="Artificial Flower" {{ old('type') == 'Artificial Flower' ? 'selected' : '' }}>Artificial Flower</option>
                        <option value="Butterfly" {{ old('type') == 'Butterfly' ? 'selected' : '' }}>Butterfly</option>
                        <option value="Money" {{ old('type') == 'Money' ? 'selected' : '' }}>Money</option>
                        <option value="Photo" {{ old('type') == 'Photo' ? 'selected' : '' }}>Photo</option>
                        <option value="Snack" {{ old('type') == 'Snack' ? 'selected' : '' }}>Snack</option>
                        <option value="Revision" {{ old('type') == 'Revision' ? 'selected' : '' }}>Revision</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <small>Max 2MB, Format: JPEG, PNG, JPG, GIF</small>
                </div>

                <div class="form-group checkbox-group">
                    <input type="checkbox" id="is_active" name="is_active" value="1" checked>
                    <label for="is_active" style="margin: 0;">Active Product</label>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Save Product
                </button>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>
</html>