<?php

session_start();
include "../classes/user.php";
$user = new User;
$user_details = $user->getUser($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!--BOOTSTRAP LINK-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
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

    <main class="container">
        <div class="card w-25 mx-auto my-5">
            <img src="../assets/images/<?= $user_details['photo'] ?>" alt="" class="card-img-top">
            <div class="card-body">
                <form action="../actions/upload-photo.php" method="post" enctype="multipart/form-data">
                    <div class="input-group input-group-sm">
                        <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
                        <button type="submit" class="btn btn-outline-success"><i class="fas fa-arrow-circle-up"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-footer border-0 bg-white">
                <p class="lead fw-bold mb-0"><?=  $user_details['first_name']." ".$user_details['last_name'] ?></p>
                <p class="lead"><?= $user_details['username'] ?></p>
            </div>
        </div>

    </main>
    
</body>
</html>