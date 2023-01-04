<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

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
            <label for="">User Name</label>
            <input type="text" name="name">
            <span class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
        <br>
            <label for="">User Email</label>
            <input type="text" name="email" value="">
            <span class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </span>
          <br>
            <label for="">User Password</label>
            <input type="text" name="password" value="">
            <span class="text-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </span>
            <br>
             {{-- <label for="">Access</label>
        {{-- <p>Insert 0 for admin access ,1 for user access</p>
        <select name="access" id="" value="" >
            <option value="" selected>No select</option>
            <option value="0">0</option>
            <option value="1" >1</option>
        </select> --}}

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
