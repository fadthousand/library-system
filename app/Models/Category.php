<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name'];

    /** @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Book, \App\Models\Category> */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
