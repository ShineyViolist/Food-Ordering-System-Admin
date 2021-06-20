<?php
    unset($_SESSION["logged_in"]);
    session_destroy();
    $_SESSION = array();
    $_SESSION["logged_in"] = "false";
    unset($_POST["SubmitInput"]);
    header("Location:".'http://localhost/Food%20Ordering%20System/backend/admin/login.php');
?>