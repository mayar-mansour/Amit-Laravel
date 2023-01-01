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
     {{-- @foreach ($categories as $category) --}}
        <form method="post" action="{{ route('product.update',$productss->id) }}">
            @csrf
            @if (Session::has('sucess'))
                <div class="alert-success">{{ Session::get('sucess') }}</div>
            @endif
            @if (Session::has('failed'))
                <div class="alert-danger">{{ Session::get('failed') }}</div>
            @endif
              <input type="hidden" name="id" value="{{$productss->id}}"/>
            <label for="">Category Name</label>
            <input type="text" name="name" value="{{$productss->name}}"/>
            <select list="browsers" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{$category->id }}">
                        {{ $category->name }}</option>
                @endforeach
            </select>
            <span class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
            <button type="submit">Submit</button>
        </form>
        {{-- @endforeach --}}

    </div>
</body>

</html>
