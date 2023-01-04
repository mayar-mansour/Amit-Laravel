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
        <form method="post" action="{{ route('user.update',$users->id) }}">
            @csrf
            @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
            @if (Session::has('failed'))
                <div class="alert-danger">{{ Session::get('failed') }}</div>
            @endif
            <input type="hidden" name="id" value="{{$users->id}}"/>
            <label for="">User Name</label>
            <input type="text" name="name" value="{{($users->name)}}">
            <label for="">User Email</label>
            <input type="text" name="email" value="{{($users->email)}}">
            <label for="">User Password</label>
            <input type="text" name="password" value="">
             {{-- <label for="">Access</label> --}}
        {{-- <p>Insert 0 for admin access ,1 for user access</p> --}}
        {{-- <select name="access" id="" value="{{($users->access)}}" >
            <option value="">No selected</option>
            <option value="0">0</option>
            <option value="1" >1</option>
        </select> --}}
            <span class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
            <button type="submit">Update</button>
        </form>
        {{-- @endforeach --}}

    </div>
</body>

</html>
