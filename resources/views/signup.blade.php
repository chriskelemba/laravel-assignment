<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <form action="/signup" method="post">
        @csrf
        <input type="text" name="name" placeholder="Enter Username"/>
        <input type="email" name="email" placeholder="Enter Email"/>
        <input type="password" name="password" placeholder="Enter Password"/>
        <input type="password" name="password_confirmation" placeholder="Confirm Password"/>
        <input type="submit" value="Signup"/>
    </form>
</body>
</html>