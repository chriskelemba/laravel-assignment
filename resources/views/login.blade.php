<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="display-4 text-center">Login</h1>
        <form method="POST" action="/login" class="w-50 mx-auto">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <a href="/">Don't have an account? Sign up here.</a>
            </form>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3">Login</button>
            </form>
        </form>
    </div>
</body>
</html>