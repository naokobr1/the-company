<?php
require "database.php";

//class ChildClass extends ParentClass { ... }
class User extends Database{

    public function createUser($first_name, $last_name, $username, $password){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`first_name`, `last_name`, `username`, `password`) VALUE ('$first_name', '$last_name', '$username', '$password')";

        if($this->conn->query($sql)){
            header("location: ../views/register.php");
            exit;
        } else {
            die("Error");
        }
    }

    function login($username, $password){
        $sql = "SELECT `id`, username, `password` FROM users WHERE username = '$username'";

        if($result = $this->conn->query($sql)){
            
            if($result->num_rows ==1){
                // check and compare the password from the UI to the DATABSDE
                $user_details = $result->fetch_assoc();
                // store all information from the data in an array $user_details
                if(password_verify($password, $user_details['password'])){
                    session_start();
                    $_SESSION['user_id'] = $user_details['id'];
                    $_SESSION['username'] = $user_details['username'];

                    header("location: ../views/dashboard.php");
                    exit;
                }else{
                    die("Password is incorrect ".$this->conn->error);
                }
            }else{
                die("Username not found".$this->conn->error);
            }
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }

    public function getAllUsers($user_id)
    {
        $sql = "SELECT `id`, `first_name`, `last_name`, `username` FROM users WHERE `id` != $user_id";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }

    public function getUser($user_id)
    {
        $sql = "SELECT `id`, `first_name`, `last_name`, `username`, `photo` FROM `users` WHERE id = $user_id";
        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }

    public function updateUser($user_id, $first_name, $last_name, $username){
        $sql_update = "UPDATE users SET `first_name`= '$first_name', `last_name`='$last_name', `username` = '$username' WHERE `id`= $user_id";

        if($this->conn->query($sql_update)){
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error in updating the user ".$this->conn->error);
        }
    }

    public function deleteUser($user_id)
    {
        $sql_delete = "DELETE FROM `users` WHERE `id`= $user_id";

        if($this->conn->query($sql_delete)){
           
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error in removing the user ".$this->conn->error);
        }
    }

    function uploadPhoto($user_id, $photo_name, $tmp_name)
    {
        
        $sql_upload_photo = "UPDATE `users` SET `photo` = '$photo_name' WHERE `id` = $user_id";
        
        # step1 is to execute the query
        if($this->conn->query($sql_upload_photo)){
            # create destination variable to store the photo in the assets/images folder
            $destination ="../assets/images/$photo_name";
            if(move_uploaded_file($tmp_name, $destination)){
                header("location: ../views/profile.php");
                exit;
            } else {
                die("Error in moving the Photo ".$this->conn->error);
            }
        } else {
            die("There's a problem with the SQL query ".$this->conn->error);
        }
    }

  
}

