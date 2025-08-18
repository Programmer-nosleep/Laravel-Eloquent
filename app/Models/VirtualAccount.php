<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * VirtualAccount model
 *
 * Represents a virtual bank account attached to a Wallet.
 * Relations:
 *  - wallet(): belongsTo Wallet
 */
class VirtualAccount extends Model
{
    // Table config
    protected $table = "virtual_accounts";
    protected $primaryKey = "id";
    protected $keyType = "int";

    public $incrementing = true;
    public $timestamps = false;

    public function wallet(): BelongsTo
    {
    // VirtualAccount belongs to a Wallet
    // Access via $virtualAccount->wallet
    return $this->belongsTo(Wallet::class, "wallet_id", "id");
    }
}
