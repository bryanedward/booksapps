<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $guarded = [];

    protected $hidden = [
        'updated_at',
    ];

    public function author(): HasMany
    {
        return $this->hasMany(Author::class);
    }



    // public function getIdAttribute()
    // {
    //     return $this->attributes['id'];
    // }
}
