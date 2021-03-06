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
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <form action="/store" method="POST" enctype="multipart/form-data">
                        @csrf
        
                        <div class="form-group row">
                            <h5 style="margin: 0 auto; margin-top: 50px;">Add a New Book</h5>                
                        </div>

                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="" autocomplete="off" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror 
                        </div>
                        <div class="form-group">
                            <label for="author" class="form-label">Author</label>
                            <input name="author" type="text" class="form-control" id="author" placeholder="" autocomplete="off" required>
                            @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror 
                        </div>
                        <div class="form-group">
                            <label for="synopsis" class="form-label">Synopsis</label>
                            <input name="synopsis" type="text" class="form-control" id="synopsis" placeholder="" autocomplete="off" required>
                            @error('synopsis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror 
                        </div>
                        <div class="form-group">
                            <label for="year" class="form-label">Released Year</label>
                            <input name="year" type="number" class="form-control" id="year" placeholder="" autocomplete="off" required>
                            @error('year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror 
                        </div>

                        <div class="form-group">
                            <label for="CoverURL" class="form-label">Cover URL</label>
                            <input for="CoverURL" class="form-control-file" type="file" name="CoverURL"/>
                        </div>
        
                        <div class="form-group row">
                            <div class="col-sm-2 mx-auto">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </body>
</html>
