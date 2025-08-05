<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'caption',
        'type',
        'name',
        'position',
        'nim',
        'division',
        'is_active',
        'link_url', 
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}