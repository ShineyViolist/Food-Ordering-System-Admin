<?php
    session_start();
    define('SITE_URL','http://localhost/Food%20Ordering%20System/backend/admin/');
    $connect = mysqli_connect("localhost","root", "") or die(mysqli_error($connect));
    $db_select = mysqli_select_db($connect,"food_ordering_system");

    echo $_SESSION["user1"];
    print_r($_SESSION);
    //!isset($_SESSION["logged_in"]) && !isset($_SESSION["user"])
    if($_SESSION["logged_in"] == "false"){
        $_SESSION["msg"] = "Enter your credentials";
        echo "hello again";
        echo $_SESSION["logged_in"];
        //header("Location:".'http://localhost/Food%20Ordering%20System/backend/admin/login.php');
    }

?>