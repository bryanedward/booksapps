<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;


    // protected $table = 'books';

    // protected $model = Book::class;

    // protected $guarded = [];

    // protected $hidden = [
    //     'updated_at',
    // ];


    public function category()
    {
        return $this->belongsTo(Category::class, "id");
    }


    // public function getIdAttribute()
    // {
    //     return $this->attributes['id'];
    // }
}
