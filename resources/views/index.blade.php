<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Books Catalogue</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{-- Bootstrap --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    </head>
    <body>
        <div class="text-center p-5">
            <a href="/add" class="btn btn-primary">Add a Book</a>
        </div>
        <div class="text-center">
            {{-- {{$books}} --}}

            {{-- @for ($i = 0; $i < 10; $i++)
                <div class="card mx-3 my-5 d-inline-block text-left" style="width: 18rem;">
                    <img src="https://willwebapp.blob.core.windows.net/willcontainer/a5Rxd3E_700b.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Card link</a>
                    </div>
                </div>
            @endfor --}}

            @foreach ($books as $book)
                <div class="card m-3 d-inline-block text-left" style="width: 18rem;">
                    <img src="{{ $book->CoverURL }}" class="card-img-top" alt="Book Cover Image" style="height: 22rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->Title }}</h5>
                        <p class="card-text" style="font-size: 80%;">{{ $book->Author }}, {{ $book->ReleaseYear }}</p>
                        <p class="card-text">{{ $book->Synopsis }}</p>
                        <div class="d-flex w-100 justify-content-between">
                            <a href="/books/{{$book->id}}" class="card-link">Read More</a>
                            <a href="/books/{{$book->id}}/edit" class="btn btn-primary text-right">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>
