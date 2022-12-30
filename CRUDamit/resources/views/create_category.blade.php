<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div class="container mt-5">

        <form action="{{ route('create') }}" method="get">
            @csrf
            @if (Session::has('sucess'))
                <div class="alert-success">{{ Session::get('sucess') }}</div>
            @endif
            @if (Session::has('failed'))
                <div class="alert-danger">{{ Session::get('failed') }}</div>
            @endif
            <label for="">Category Name</label>
            <input type="text" name="name">
            <span class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
