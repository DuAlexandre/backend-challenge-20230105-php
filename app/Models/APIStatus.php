<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APIStatus extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'dateImport',
        'status',
        'memoryConsumed'
    ];
}
