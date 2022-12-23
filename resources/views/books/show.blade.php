@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-5 mt-3">
            <div class="form-group">
                <h4><strong>Book Name:</strong></h4>
                <h4>{{ $book->name }}</h4>
            </div>
        </div>

        <h5>Authors</h5>
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>Name</th>
            </tr>
            @foreach ($book->authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection
