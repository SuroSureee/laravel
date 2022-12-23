@extends('books.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-5 mb-3">
            <div class="mb-3">
                <a class="btn btn-primary" href="{{ route('authors.index') }}"> Authors</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create New Book</a>
            </div>
        </div>
    </div>

    @if ($message = \Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="mb-5 mt-3">
        <form action="{{ route('books.index') }}" method="GET">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="select2Multiple">Field</label>
                            <select class="form-control" name="searchField">
                                <option value=""></option>
                                <option value="id" @if(request()->get('searchField') == 'id')selected="selected"@endif>id</option>
                                <option value="name" @if(request()->get('searchField') == 'name')selected="selected"@endif>name</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>Value</label>
                            <input type="text" name="searchValue" class="form-control" value="{{request()->get('searchValue')}}" placeholder="Search">
                        </div>

                        <a href="/">
                            <button type="button" class="btn btn-info mt-3">Reset</button>
                        </a>
                        <button type="submit" class="btn btn-danger mt-3">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>@sortablelink('id')</th>
            <th>@sortablelink('name')</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $key => $book)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $book->id }}</td>
                <td>{{ $book->name }}</td>
                <td>
                    <form action="{{ route('books.destroy',$book->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $books->links() !!}

@endsection
