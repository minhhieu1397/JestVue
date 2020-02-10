<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-md-11 content">
                <div class="row">
                    <div class="col-md-3 offset-md-2">
                        <h2 class="text-center">Add col</h2>
                        <form method="POST" action="{{ route('post.database') }}" role="form">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="usr">Name:</label>
                                <input type="text" class="form-control" id="usr" name="name">
                            </div>
                            <div class="form-group">
                                <label for="pwd">type:</label>
                                <input type="text" class="form-control" id="pwd" name="type">
                            </div>
                            <div class="btncre">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-11 content">
            <div class="row">
                <div class="col-md-3 offset-md-2">
                    <h2 class="text-center">Delete col</h2>
                    <form method="POST" action="{{ route('delete.col') }}" role="form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="usr">Name col:</label>
                            <input type="text" class="form-control" id="usr" name="name">
                        </div>

                        <div class="btncre">
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


</html>