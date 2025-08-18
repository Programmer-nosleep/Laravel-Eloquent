<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Product model
 *
 * Represents a product belonging to a Category.
 * Relations:
 *  - category(): belongsTo Category
 *  - reviews(): hasMany Review
 */
class Product extends Model
{
    // table config
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function category(): BelongsTo
    {
        // Product belongs to Category; access via $product->category
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function reviews(): HasMany
    {
        // Product has many reviews; access via $product->reviews (Collection)
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
}
