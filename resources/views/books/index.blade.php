@extends('layout')

@section('mainContent')
<div class="card-header">Books Data</div>
    <div class="card-body">
        <a href="/books/create" class="m-2 btn btn-primary">+ Add Book Data</a>
        <div class="mb-3 d-flex align-items-center">
        <table class="table table-striped" id="filteredResultsContainer"> 
            <tr>
                <th>ISBN</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->isbn }}</td>
                <td><a href="/books/{{$book->isbn}}">{{ $book->title }}</a></td>
                <td>{{ $book->category->name }}</td>
                <td>{{ $book->author }}</td>
                <td>${{ $book->price }}</td>
                <td>
                    <a class="m-2 btn btn-warning btn-sm" href="{{ route('books.edit', $book->isbn) }}">Edit</a>
                    <!-- <a class="m-2 btn btn-danger btn-sm" href="{{ route('books.destroy', $book->isbn) }}">Delete</a> -->
                    <form method="POST" action="{{ route('books.destroy', $book->isbn) }}" data-toggle="modal" data-target="#confirmDeleteModal{{ $book->id }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        

    </div>
</div>

@endsection