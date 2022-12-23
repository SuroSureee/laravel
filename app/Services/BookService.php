<?php

namespace App\Services;

use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookService
{
    public function index()
    {
        $books = Book::sortable();

        if (request('searchField') &&
            in_array(request('searchField'), Book::$searchFields)) {
            if (request('searchValue')) {
                $books->where(request('searchField'), 'like', '%' . request('searchValue') . '%');
            }
        }

        return $books->simplePaginate(10);
    }

    public function store(BookRequest $data): Book
    {
        $book = Book::create($data->validated());
        $book->authors()->attach($data['authors']);

        return $book;
    }

    public function update(BookRequest $data, Book $book)
    {
        $book->update(['name' => $data->validated()['name']]);
        $book->authors()->sync($data['authors']);

        return $book;
    }
}
