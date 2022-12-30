<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
        {{-- @foreach ($data as $datas) --}}
    <form action="{{ route('update')}}" method="post" class="m-2">
        @csrf
        {{-- @dd($data->id) --}}
             <input type="hidden" name="id" value="{{$data->id}}">
        <label for="">Name</label>
        <input type="text" name="email" value="{{$data->email}}">
        <label for="">Password</label>
        <input type="text" name="password" value="{{$data->password}}">
        <button type="submit" class="btn btn-success">update</button>
    </form>
    {{-- @endforeach --}}
</body>
</html>
