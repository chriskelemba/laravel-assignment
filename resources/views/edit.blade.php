<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="/users/{{ $user->id }}" method="post">
        @csrf
        @method('PATCH')
        <input type="text" name="name" value="{{ $user->name }}"/>
        <input type="email" name="email" value="{{ $user->email }}"/>
        <input type="password" name="password" placeholder="Enter Password (optional)"/>
        <input type="submit" value="Update User"/>
    </form>
</body>
</html>