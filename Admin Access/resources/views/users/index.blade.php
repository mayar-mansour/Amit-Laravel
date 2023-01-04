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
            <a href="{{ route('index') }}" class="btn btn-dark">Create New User</a>
            @endif
            <a href="{{ route('logout') }}" class="btn btn-danger" style="margin-left: auto;">Logout</a>
        </div>
        <table class="table table-striped" id="users-table">
            <thead>
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>
                            <form method="get" action="{{ route('user.delete', $user->id) }}">

                                @if (Auth::user()->access == 1)
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    <a type="submit" href="{{ route('user.edit', $user->id) }}"
                                        class="btn btn-primary btn-sm">update</a>
                                @endif
                                <a type="submit" href="{{ route('user.display', $user->id) }}"
                                    class="btn btn-success btn-sm">View</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
