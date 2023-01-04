
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
                 {{-- @foreach ($categories as $category) --}}
                 <h3 class="">Users Name:</h3>
                    <h6>{{$users->name}}</h6>
                 <h3>Users Email:</h3>
                    <h6>{{$users->email}}</h6>
                @if ($users->access == '0') <h2 class="" style="color: red;">User Access</h2>
                @else <h2  style="color: green;">Admin Access</h2>
                @endif
                {{-- @endforeach --}}
              </tbody>
            </table>
        </div>
    </body>
</html>
