<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Comments model
 *
 * Simple example model used in tests/resources.
 * Fields: id, title, comment, timestamps
 */
class Comments extends Model
{
    protected $table = 'comments';
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = true;

    // Default example attributes used in tests
    protected $attributes = [
        'title' => 'Sample Title',
        'comment' => 'Sample Comment',
    ];
}
