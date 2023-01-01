<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

    <title>Document</title>
</head>
<body>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
         <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{ route('register') }}" method="post">
        @csrf
        <input type="text" placeholder="name" name="name">
        <input type="email" placeholder="email" name="email">
        <input type="password" placeholder="password" name="password">
        <label for="">Access</label>
        {{-- <p>Insert 0 for admin access ,1 for user access</p> --}}
        <select name="access" id="" >
            <option value="0">0</option>
            <option value="1" >1</option>
        </select>
        {{-- <input type="text" name="access" placeholder="o or 1"> --}}
        <input type="submit" value="register">
    </form>
</body>
</html>
