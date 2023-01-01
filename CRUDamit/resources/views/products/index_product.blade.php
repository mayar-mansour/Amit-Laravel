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
<div class="d-flex">
               @if (Auth::user()->access == 1)
<a href="{{route('product.index')}}" class="btn btn-primary">CREATE NEW Product</a>
            @endif
            <a href="{{ route('logout') }}" class="btn btn-danger" style="margin-left: auto;">Logout</a>
        </div>




        <table class="table table-striped" id="users-table">
            <thead>
                <tr>
                    <th scope="col">product</th>
                    <th scope="col">category</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        {{-- <td>{{ $product->category_id }}</td> --}}
                        {{-- @if ($product->category) --}}
                            <td class="col-md-2">{{ $product->category->name }}</td>
                        {{-- @else --}}
                            <td>
                                <form method="get" action="{{route('product.delete',$product->id)}}">
@if (Auth::user()->access == 1)
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            <a type="submit" href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm">update</a>
                            @endif
                            <a type="submit" href="{{route('product.display',$product->id)}}" class="btn btn-success btn-sm">View</a>
                        </form>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
