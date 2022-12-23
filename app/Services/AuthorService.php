<?php

namespace App\Services;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;

class AuthorService
{

    public function index()
    {
        $authors = Author::latest()->simplePaginate(10);
        return $authors;

    }

    public function store(array $data): Author
    {
        $author = Author::create($data);
        return $author;
    }

    public function update(array $data, Author $author)
    {
        $author->update(['name' => $data['name']]);

        return $author;
    }
}
