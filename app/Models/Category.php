<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * Relación uno a muchos con libros
     */
    public function books()
    {
        return $this->hasMany(Book::class, 'category_id');
    }
}

