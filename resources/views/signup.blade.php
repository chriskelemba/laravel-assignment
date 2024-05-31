<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="display-4 text-center">Signup</h1>
        <form action="/signup" method="post" class="w-50 mx-auto">
            @csrf
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <div class="form-group">
                <a href="login">Already have an account? Log in.</a>
            </form>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3">Sign Up</button>
            </form>
        </form>
    </div>
</body>
</html>