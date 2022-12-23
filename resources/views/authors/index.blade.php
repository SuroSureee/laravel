@extends('authors.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-5 mb-3">
            <div class="mb-3">
                <a class="btn btn-primary" href="{{ route('books.index') }}"> Books</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('authors.create') }}"> Create New Author</a>
            </div>
        </div>
    </div>

    @if ($message = \Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>id</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($authors as $key => $author)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td>
                    <form action="{{ route('authors.destroy',$author->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('authors.show',$author->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('authors.edit',$author->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $authors->links() !!}

@endsection
