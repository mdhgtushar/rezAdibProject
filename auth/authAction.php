<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'php_auth');


if(isset($_POST['submitLogin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($con, $query);

    if($result){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
               $_SESSION['logedInUserId'] =  $row['email'];
               echo '<script>window.location.href = "../dashbord.php";</script>';
            }
        }else{
        echo '<script>window.location.href = "../login.php";</script>';
               $_SESSION['logedInUsererror'] =  "Something wrong";
    }
    }
}


?>