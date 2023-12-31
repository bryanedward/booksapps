<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;

class AuthorController extends RelationController
{
    use DisableAuthorization;

    
    protected $model = Book::class;
    protected $relation = 'author';
}
