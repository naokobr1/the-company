<?php
session_start();
include_once "../classes/user.php";

$user = new User;

$user_id = $_POST['user_id'];
$user->deleteUser($user_id);

?>