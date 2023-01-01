
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
                 <h1>product Name:</h1>
                    <h5>{{$products->name}}</h5>
                    <h1>Category Type:</h1>
                    <h5>{{$products->category->name}}</h5>
                {{-- @endforeach --}}
              </tbody>
            </table>
        </div>
    </body>
</html>
