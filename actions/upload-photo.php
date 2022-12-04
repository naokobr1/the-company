<?php
session_start();
include_once "../classes/user.php";

$user = new User;

$user_id = $_SESSION['user_id'];
$photo_name = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$user->uploadPhoto($user_id, $photo_name, $tmp_name);
// echo $photo_name . $photo_tmp;

?>