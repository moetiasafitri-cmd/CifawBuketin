<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
        'image',
        'status', // Ubah dari is_active ke status
        'is_active' // Tetap simpan untuk kompatibilitas
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    /**
     * Accessor untuk status - supaya kompatibel dengan is_active
     */
    public function getStatusAttribute()
    {
        return $this->is_active ? 'active' : 'inactive';
    }

    /**
     * Mutator untuk status - sync dengan is_active
     */
    public function setStatusAttribute($value)
    {
        $this->attributes['is_active'] = ($value === 'active');
    }

    /**
     * Get full image URL
     */
    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . $this->image);
        }
        
        // Fallback jika tidak ada gambar
        return asset('images/default-product.jpg');
    }

    /**
     * Get thumbnail URL (bisa sama dengan image_url atau ukuran lebih kecil)
     */
    public function getThumbnailUrlAttribute()
    {
        return $this->image_url; // Bisa diganti dengan thumbnail khusus jika perlu
    }

    /**
     * Format price dengan mata uang
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    /**
     * Scope untuk produk aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk produk tidak aktif
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    /**
     * Cek apakah produk aktif
     */
    public function isActive()
    {
        return $this->is_active;
    }

    /**
     * Boot method untuk event listeners
     */
    protected static function boot()
    {
        parent::boot();

        // Hapus gambar saat produk dihapus
        static::deleting(function ($product) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
        });

        // Update is_active ketika status di-set
        static::saving(function ($product) {
            if (isset($product->status)) {
                $product->is_active = ($product->status === 'active');
            }
        });
    }
}