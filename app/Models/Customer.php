<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * Customer model
 *
 * Represents an application customer.
 * Fields: id (string PK), name, email, etc.
 * Relations:
 *  - wallet(): hasOne Wallet
 *  - virtualAccount(): hasOneThrough VirtualAccount via Wallet
 *  - reviews(): hasMany Review
 */
class Customer extends Model
{

    // Table configuration
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public $incrementing = false;
    public $timestamps = false;

    public function wallet(): HasOne
    {
        // One-to-one: Customer -> Wallet
        // Access via $customer->wallet
        return $this->hasOne(Wallet::class, "customer_id", "id");
    }

    public function virtualAccount(): HasOneThrough
    {
        // Has-one-through: Customer -> Wallet -> VirtualAccount
        // Access via $customer->virtualAccount
        return $this->hasOneThrough(
            VirtualAccount::class,
            Wallet::class,
            "customer_id",
            "wallet_id",
            "id",
            "id"
        );
    }

    public function reviews(): HasMany
    {
        // One-to-many: Customer -> Review
        // Access via $customer->reviews (Collection)
        return $this->hasMany(Review::class, "customer_id", "id");
    }

    public function likeProducts(): BelongsTo
    {
        return $this->belongsTo(Product::class, "customers_likes_products", "customer_id", "product_id");
    }
}
