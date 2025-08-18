<?php

namespace App\Models;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Category model
 *
 * Represents a product category. Common fields: id, name, description, is_active.
 * Relations:
 *  - products(): hasMany Product
 *  - cheapestProduct / mostExpensiveProduct: hasOne aggregated relations
 *  - reviews(): hasManyThrough Review via Product
 */
class Category extends Model
{
    use HasFactory;

    // DB table name and PK config
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'description',
    ];

    public function products(): HasMany
    {
    // One-to-many: Category -> Products
    // Access via $category->products (Collection)
    return $this->hasMany(Product::class, 'category_id', 'id');
    }

    protected static function booted() : void
    {
        parent::booted();
        self::addGlobalScope(new IsActiveScope());
    }

    public function cheapestProduct(): HasOne
    {
    // Aggregated relation: cheapest product in this category
    // Access via $category->cheapestProduct
    return $this->hasOne(Product::class, "category_id", "id")->oldest("price");
    }
    
    public function mostExpensiveProduct(): HasOne
    {
        return $this->hasOne(Product::class, "category_id", "id")->latest("price");
    }

    public function reviews(): HasManyThrough
    {
        // Has-many-through: Category -> Product -> Review
        // Access via $category->reviews (Collection of Review)
        return $this->hasManyThrough(
            Review::class,
            Product::class,
            "category_id",
            "product_id",
            "id",
            "id",
        );
    }
}
