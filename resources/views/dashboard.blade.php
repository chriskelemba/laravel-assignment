<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="p-3 d-flex flex-row justify-content-between">
            <h1 class="display-4">Dashboard</h1>
            <a href="{{ route('logout') }}" class="btn btn-secondary h-25 mt-3">Logout</a>
        </div>
        <table class="table table-striped">
            <?php
            use Illuminate\Support\Facades\DB;

            $users = DB::table('users')->get();
            
            foreach ($users as $user) {
            ?>
            <tr>
                <td><?php echo $user->name;?></td>
                <td><?php echo $user->email;?></td>
                <td><a href="/users/{{ $user->id }}/edit" class="btn btn-primary btn-sm">Edit</a></td>
                <td><a href="/users/{{ $user->id }}/delete" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
            <?php
            }
            ?>
        </table>

        <h2 class="mt-4 p-3 display-5">Add New User</h2>
        <form action="/users" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Username"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password"/>
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>
</body>
</html>