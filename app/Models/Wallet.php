<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Wallet model
 *
 * Represents a monetary wallet linked to a Customer.
 * Fields: id (int PK), customer_id (FK), amount, etc.
 * Relations:
 *  - customer(): belongsTo Customer
 *  - virtualAccount(): hasOne VirtualAccount
 */
class Wallet extends Model
{
    // Table config
    protected $table = 'wallets';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = true;
    public $timestamps = false;

    public function customer(): BelongsTo
    {
    // Inverse one-to-one: Wallet belongs to Customer
    // Access via $wallet->customer
    return $this->belongsTo(Customer::class, "customer_id", "id");
    }

    public function virualAccount(): HasOne
    {
    // One-to-one: Wallet -> VirtualAccount
    // Access via $wallet->virualAccount
    return $this->hasOne(VirtualAccount::class, "wallet_id", "id");
    }
}
