<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'address',
        'phone',
        'email',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
