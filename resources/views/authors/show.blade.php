@extends('authors.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Author</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('authors.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-5 mt-3">
            <div class="form-group">
                <h4><strong>Author Name:</strong></h4>
                <h4>{{ $author->name }}</h4>
            </div>
        </div>

        <h5>Books</h5>
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>Name</th>
            </tr>
            @foreach ($author->books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
