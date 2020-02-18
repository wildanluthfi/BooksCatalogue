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

        <div class="container p-5">
            <div class="row">
                <div class="col-4 offset-1">
                    <img src="{{ $book->CoverURL }}" alt="cover image" style="width: 100%;">
                </div>
                <div class="col-6">
                    <h1>{{ $book->Title }}</h1>
                    <h4>{{ $book->Author }}, {{ $book->ReleaseYear }}</h4>
                    <p>Synopsis: {{ $book->Synopsis }}</p>

                    <h5 class="mt-5">Leave a Review</h5>
                    <form action="/review/store" method="POST">
                        @csrf
                        <input type="hidden" name="BookId" value="{{ $book->id }}">

                        <div class="form-group">
                            <label for="username" class="form-label">Your Name</label>
                            <input name="username" type="text" class="form-control" id="username" placeholder="" autocomplete="off" required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror 
                        </div>
                        <div class="form-group">
                            <label for="comment" class="form-label">Comment</label>
                            <input name="comment" type="text" class="form-control" id="comment" placeholder="" autocomplete="off" required>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror 
                        </div>
                        <div class="form-group">
                            <p class="form-label">Rating</p>
                            <div class="col">
                                <input type="radio" id="a1" name="Rating" value="1">
                                <label for="a1" class="col-1 col-form-label">1</label>
                                <input type="radio" id="a2" name="Rating" value="2">
                                <label for="a2" class="col-1 col-form-label">2</label>
                                <input type="radio" id="a3" name="Rating" value="3">
                                <label for="a3" class="col-1 col-form-label">3</label>
                                <input type="radio" id="a4" name="Rating" value="4">
                                <label for="a4" class="col-1 col-form-label">4</label>
                                <input type="radio" id="a5" name="Rating" value="5">
                                <label for="a5" class="col-1 col-form-label">5</label>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <div class="">
                                <button type="submit" class="btn btn-primary">Submit Review</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row">
                <h3>Reviews</h3>
                <div class="list-group mx-auto py-3 w-100">
                    @foreach ($reviews as $review)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $review->ReviewerName }}</h5>
                                <small>3 days ago</small>
                            </div>
                            <p class="mb-1">{{ $review->Comment }}</p>
                            <small>Rated {{ $review->Rating }}/5</small>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
