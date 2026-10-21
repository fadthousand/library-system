<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
            'title',
            'author',
            'year',
            'stock',
            'category_id', // Properti baru ditambahkan
        ];

    /** @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Category, \App\Models\Book> */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
