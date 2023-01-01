
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





            <table class="table table-striped" id="users-table">
              <thead>
                <tr>
                  <th scope="col">Category</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>
                 @foreach ($categories as $category)
                  <tr>
                    <td>{{$category->name}}</td>

                    <td>
                        <form method="get" action="{{route('cat.delete',$category->id)}}">

                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            <a type="submit" href="{{route('cat.edit',$category->id)}}" class="btn btn-primary btn-sm">update</a>
                            <a type="submit" href="{{route('cat.display',$category->id)}}" class="btn btn-success btn-sm">View</a>
                        </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </body>
</html>
