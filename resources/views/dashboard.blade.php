<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>
    <table>
        <?php
        use Illuminate\Support\Facades\DB;

        $users = DB::table('users')->get();
        
        foreach ($users as $user) {
     ?>
        <tr>
        <td><?php echo $user->name;?></td>
        <td><?php echo $user->email;?></td>
        <td><a href="/users/{{ $user->id }}/edit">Edit</a></td>
        <td><a href="/users/{{ $user->id }}/delete">Delete</a></td>
        </tr>
        <?php
        }
     ?>
    </table>

    <h2>Add New User</h2>
    <form action="/users" method="post">
        @csrf
        <input type="text" name="name" placeholder="Enter Username"/>
        <input type="email" name="email" placeholder="Enter Email"/>
        <input type="password" name="password" placeholder="Enter Password"/>
        <input type="submit" value="Add User"/>
    </form>

    <a href="{{ route('logout') }}">Logout</a>
</body>
</html>