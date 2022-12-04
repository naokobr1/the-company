<?php
session_start();
include "../classes/user.php";
$user = new User();

$user_details = $user->getUser($_GET['user_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Edit User</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1>
            </a>
        </div>
        <div class="ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link"><?= $_SESSION['username'] ?></a>
                </li>
                <li class="nav-item">
                    <a href="../actions/logout.php" class="nav-link text-danger">Log out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div style="height: 100vh">
        <div class="row h-100 m-0">
            <div class="card w-50 mx-auto border-0">

                <div class="card-header bg-transparent border-0">
                    <h1 class="text-center">Edit User</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/edit-user.php" method="post">
                        <input type="hidden" name="user_id" value="<?= $user_details['id'] ?>">
                        <label for="first-name" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first-name" value="<?= $user_details['first_name'] ?>"
 class="form-control mb-2">

                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last-name" value="<?= $user_details['last_name'] ?>" class="form-control mb-2">
                        
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" value="<?= $user_details['username'] ?>"class="form-control mb-2" maxlength="15">
                        


                        <button type="submit" class="btn btn-success w-100">SAVE</button>
                        <p class="text-center mt-3 small">Registerd already? <a href="../views">Log in.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>