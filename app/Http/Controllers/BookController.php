<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

/**
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class BookController extends  Controller
{
    use DisableAuthorization;

    /**
     * @var string
     */
    protected $model = Book::class;

   
    // protected $attributes = ['id', 'title'];

    // /**
    //  * @var string
    //  */
    // // protected $request = BookRequest::class;

    protected function keyName(): string
    {
        return 'id';
    }

    /**
     * Runs the given query for fetching entities in index method.
     */
    protected function runIndexFetchQuery(Request $request, Builder $query, int $paginationLimit): LengthAwarePaginator
    {
        return $query->paginate($paginationLimit, ['id','title','created_at','updated_at']);
    }

    protected function performStore(Request $request, Model $entity, array $attributes): void
    {
        $entity->category_id = $request->category_id;
        $entity->title = "sk_" . $request->title;
        $entity->save();
    }
    

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildIndexFetchQuery($request, $requestedRelations);

        $query->whereNotNull('created_at');

        return $query;
    }

    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $book = Book::all();

    //     return [
    //         'book' => $book
    //     ];
    // }

    // // /**
    // //  * Show the form for creating a new resource.
    // //  */
    // // public function create(Request $request)
    // // {
    // //     $title = $request->input('title');
    // //     $details = $request->input("details");
    // // }

    // // /**
    // //  * Store a newly created resource in storage.
    // //  */
    // // public function store(StoreBookRequest $request)
    // // {
    // //     //
    // // }

    // // /**
    // //  * Display the specified resource.
    // //  */
    // // public function show(Request $request, $id)
    // // {

    // //     $data = Book::find($id);

    // //     return [
    // //         'data' => $data->category
    // //     ];
    // // }

    // // /**
    // //  * Show the form for editing the specified resource.
    // //  */
    // // public function edit(Book $book)
    // // {
    // //     //
    // // }

    // // /**
    // //  * Update the specified resource in storage.
    // //  */
    // // public function update(UpdateBookRequest $request, Book $book)
    // // {
    // //     //
    // // }

    // // /**
    // //  * Remove the specified resource from storage.
    // //  */
    // // public function destroy(Book $book)
    // // {
    // //     //
    // // }
}
