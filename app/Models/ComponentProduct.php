<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentProduct extends Model
{
    use HasFactory;
    protected $table = 'component_product';
    protected $fillable = [
        'parent_id',
        'child_id',
        'quantity',
    ];
}
