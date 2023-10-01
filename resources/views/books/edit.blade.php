@extends('layout')

@section('mainContent')
<div class="card-header">Books Data</div>
    <div class="card-body">
        <form method="POST" autocomplete="on" action="{{ route('books.update', $book->isbn) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{$book->isbn}}">
                <div class="text-danger"><?php if (isset($error_isbn)) echo $error_isbn ?></div>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}">
                <div class="text-danger"><?php if (isset($error_title)) echo $error_title ?></div>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" class="form-control" required>
                <option value="none" <?php if (!isset($book->category)) echo 'selected' ?>>--Select a Category--</option>
                <option value="Education" <?php if (isset($book->category) && $book->category->name == "Education") echo 'selected' ?>>Education</option>
                <option value="Fiction" <?php if (isset($book->category) && $book->category->name == "Fiction") echo 'selected' ?>>Fiction</option>
                <option value="Motivation" <?php if (isset($book->category) && $book->category->name == "Motivation") echo 'selected' ?>>Motivation</option>
                <option value="Romance" <?php if (isset($book->category) && $book->category->name == "Romance") echo 'selected' ?>>Romance</option>
                </select>
                <div class="text-danger"><?php if (isset($error_category)) echo $error_category ?></div>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" id="author" name="author" value="{{$book->author}}">
                <div class="text-dannger"><?php if (isset($error_author)) echo $error_author ?></div>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="{{$book->price}}">
                <div class="text-danger"><?php if (isset($error_price)) echo $error_price ?></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
            <a href="/books" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection