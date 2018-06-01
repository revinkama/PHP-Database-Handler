<?php
include_once("DataBaseController.php");

function hashPassword(){

    $db_handle = new DataBaseController();
    $connection = $db_handle->connectDB();
    $result = runQuery($connection,"SELECT * FROM users WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
    $count  = numRows($result);
    $hash = password_hash($password, PASSWORD_BCRYPT, $result['password']);

}


function check(){
    if(isset($_POST['submit'])) {
	    if($count==0) {
            $message = "Invalid Username or Password!";
            header("Location: ../index.php");
        } 

        else if(password_verify($result['password'], $hash) && $result['role']=='student'){
            header("Location: ../home.php");
            exit();
        }

        else if(password_verify($result['password'], $hash) && $result['role']=='admin'){
            header("Location: ../adminhome.php");
            exit();
        }
        
        else if(password_verify($result['password'], $hash) && $result['role']=='faculty'){
            header("Location: ../facultyhome.php");
            exit();
        }
	}
}


?>