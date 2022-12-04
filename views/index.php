<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container mt-5" style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 my-auto mx-auto">
                <h1 class="text-center">LOGIN</h1>
            
                <div class="card-body">
                    <form action="../actions/login.php" method="post">

                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>

                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>

                        <input type="submit" value="Log in" class="btn btn-outline-success w-100 mt-2" required>

                    </form>
                    <p class="text-center mt-3 small">Don't have an account <a href="register.php" class="text-decoration-none">create one here</p>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>