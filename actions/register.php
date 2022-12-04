<?php
include "../classes/user.php";

$first_name = $_POST['first_name']; 
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$photo = '../assets/images/profile.png';

$user = new User;

$user->createUser($first_name, $last_name, $username, $password)
?>