<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'categories_id',
    ];
    public function Categories()
    {
        return $this->belongsTo(Categories::class);
    }
}
