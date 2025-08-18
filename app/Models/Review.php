<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Review model
 *
 * Product reviews left by Customers.
 * Relations:
 *  - product(): belongsTo Product
 *  - customer(): belongsTo Customer
 */
class Review extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;

    public function product(): BelongsTo
    {
    // Review belongs to a Product
    return $this->belongsTo(Product::class, "product_id", "id");
    }

    public function customer(): BelongsTo
    {
    // Review belongs to a Customer
    return $this->belongsTo(Customer::class, "customer_id", "id");
    }
}
