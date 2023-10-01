@extends('layout')

@section('mainContent')
<section class="p-4 book-details">
    <a href="/books" class="mb-3 btn btn-secondary">Kembali</a>
    <div class="row ">
        <div class="col-md-8">
            <h1 class="display-4 font-weight-bold">{{$book->title}}</h1>
            <p class="lead">{{$book->author}}</p>
            <table class="table">
                <tr>
                    <th>Jumlah Halaman</th>
                    <td>{{$book->jml_halaman}}</td>
                    
                </tr>
                <tr>
                    <th>Tanggal Terbit</th>
                    <td>{{$book->tgl_terbit}}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{$book->category->name}}</td>
                </tr>
                <tr>
                    <th>ISBN</th>
                    <td>{{$book->isbn}}</td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <td>{{$book->penerbit}}</td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <td>${{$book->price}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="p-4 mt-4 rounded row"  style="background: rgba(0, 123, 255, 0.1)">
        <div class="col">
            <h2>Sinopsis</h2>
            <p class="text-justify">
            @if ($book->bookReview)
                <p class="text-justify">
                    {{ $book->bookReview->Review }}
                </p>
            @else
                <p class="text-justify">
                    Sinopsis tidak tersedia.
                </p>
            @endif
            </p>
        </div>
    </div>
</section>

@endsection