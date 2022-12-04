<?php
session_start();
include "../classes/user.php";

#create the object for class User
$user = new User();

#create a variable that holds the result of the in an array format
$user_list = $user->getAllUsers($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard - The Company</title>
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
    <main class="container" style="padding-top: 80px">
        <h2 class="text-muted display-6">USER LIST</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th></th><!--Leaving this empty for the action such -->
                </tr>
                

            </thead>
            <tbody>
                <?php

                    while($user_details = $user_list->fetch_assoc()){
                ?>
                        <tr>
                            <td> <?= $user_details['id'] ?> </td>
                            <td> <?= $user_details['first_name'] ?> </td>
                            <td> <?= $user_details['last_name'] ?> </td>
                            <td> <?= $user_details['username'] ?> </td>
                            <td>
                                <a href="edit-user.php?user_id=<?=$user_details['id']?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></a>
                                <a href="delete-user.php?user_id=<?=$user_details['id']?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php       
                    }

                ?>
            </tbody>
        </table>
    </main>
    
</body>
</html>